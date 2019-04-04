/**!
 * @fileOverview Kickass library to create and place poppers near their reference elements.
 * @version 1.12.5
 * @license
 * Copyright (c) 2016 Federico Zivolo and contributors
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */(function(global,factory){"object"===typeof exports&&"undefined"!==typeof module?module.exports=factory():"function"===typeof define&&define.amd?define(factory):global.Popper=factory()})(this,function(){'use strict';for(var nativeHints=["native code","[object MutationObserverConstructor]"],isNative=function(fn){return nativeHints.some(function(hint){return-1<(fn||"").toString().indexOf(hint)})},isBrowser="undefined"!==typeof window,longerTimeoutBrowsers=["Edge","Trident","Firefox"],timeoutDuration=0,i=0;i<longerTimeoutBrowsers.length;i+=1){if(isBrowser&&0<=navigator.userAgent.indexOf(longerTimeoutBrowsers[i])){timeoutDuration=1;break}}function microtaskDebounce(fn){var scheduled=!1,i=0,elem=document.createElement("span"),observer=new MutationObserver(function(){fn();scheduled=!1});observer.observe(elem,{attributes:!0});return function(){if(!scheduled){scheduled=!0;elem.setAttribute("x-index",i);i=i+1;// don't use compund (+=) because it doesn't get optimized in V8
}}}function taskDebounce(fn){var scheduled=!1;return function(){if(!scheduled){scheduled=!0;setTimeout(function(){scheduled=!1;fn()},timeoutDuration)}}}// It's common for MutationObserver polyfills to be seen in the wild, however
// these rely on Mutation Events which only occur when an element is connected
// to the DOM. The algorithm used in this module does not use a connected element,
// and so we must ensure that a *native* MutationObserver is available.
var supportsNativeMutationObserver=isBrowser&&isNative(window.MutationObserver),debounce=supportsNativeMutationObserver?microtaskDebounce:taskDebounce;/**
* Create a debounced version of a method, that's asynchronously deferred
* but called in the minimum time possible.
*
* @method
* @memberof Popper.Utils
* @argument {Function} fn
* @returns {Function}
*/ /**
 * Check if the given variable is a function
 * @method
 * @memberof Popper.Utils
 * @argument {Any} functionToCheck - variable to check
 * @returns {Boolean} answer to: is a function?
 */function isFunction(functionToCheck){var getType={};return functionToCheck&&"[object Function]"===getType.toString.call(functionToCheck)}/**
 * Get CSS computed property of the given element
 * @method
 * @memberof Popper.Utils
 * @argument {Eement} element
 * @argument {String} property
 */function getStyleComputedProperty(element,property){if(1!==element.nodeType){return[]}// NOTE: 1 DOM access here
var css=window.getComputedStyle(element,null);return property?css[property]:css}/**
 * Returns the parentNode or the host of the element
 * @method
 * @memberof Popper.Utils
 * @argument {Element} element
 * @returns {Element} parent
 */function getParentNode(element){if("HTML"===element.nodeName){return element}return element.parentNode||element.host}/**
 * Returns the scrolling parent of the given element
 * @method
 * @memberof Popper.Utils
 * @argument {Element} element
 * @returns {Element} scroll parent
 */function getScrollParent(element){// Return body, `getScroll` will take care to get the correct `scrollTop` from it
if(!element||-1!==["HTML","BODY","#document"].indexOf(element.nodeName)){return window.document.body}// Firefox want us to check `-x` and `-y` variations as well
var _getStyleComputedProp=getStyleComputedProperty(element),overflow=_getStyleComputedProp.overflow,overflowX=_getStyleComputedProp.overflowX,overflowY=_getStyleComputedProp.overflowY;if(/(auto|scroll)/.test(overflow+overflowY+overflowX)){return element}return getScrollParent(getParentNode(element))}/**
 * Returns the offset parent of the given element
 * @method
 * @memberof Popper.Utils
 * @argument {Element} element
 * @returns {Element} offset parent
 */function getOffsetParent(element){// NOTE: 1 DOM access here
var offsetParent=element&&element.offsetParent,nodeName=offsetParent&&offsetParent.nodeName;if(!nodeName||"BODY"===nodeName||"HTML"===nodeName){return window.document.documentElement}// .offsetParent will return the closest TD or TABLE in case
// no offsetParent is present, I hate this job...
if(-1!==["TD","TABLE"].indexOf(offsetParent.nodeName)&&"static"===getStyleComputedProperty(offsetParent,"position")){return getOffsetParent(offsetParent)}return offsetParent}function isOffsetContainer(element){var nodeName=element.nodeName;if("BODY"===nodeName){return!1}return"HTML"===nodeName||getOffsetParent(element.firstElementChild)===element}/**
 * Finds the root node (document, shadowDOM root) of the given element
 * @method
 * @memberof Popper.Utils
 * @argument {Element} node
 * @returns {Element} root node
 */function getRoot(node){if(null!==node.parentNode){return getRoot(node.parentNode)}return node}/**
 * Finds the offset parent common to the two provided nodes
 * @method
 * @memberof Popper.Utils
 * @argument {Element} element1
 * @argument {Element} element2
 * @returns {Element} common offset parent
 */function findCommonOffsetParent(element1,element2){// This check is needed to avoid errors in case one of the elements isn't defined for any reason
if(!element1||!element1.nodeType||!element2||!element2.nodeType){return window.document.documentElement}// Here we make sure to give as "start" the element that comes first in the DOM
var order=element1.compareDocumentPosition(element2)&Node.DOCUMENT_POSITION_FOLLOWING,start=order?element1:element2,end=order?element2:element1,range=document.createRange();range.setStart(start,0);range.setEnd(end,0);var commonAncestorContainer=range.commonAncestorContainer;// Both nodes are inside #document
if(element1!==commonAncestorContainer&&element2!==commonAncestorContainer||start.contains(end)){if(isOffsetContainer(commonAncestorContainer)){return commonAncestorContainer}return getOffsetParent(commonAncestorContainer)}// one of the nodes is inside shadowDOM, find which one
var element1root=getRoot(element1);if(element1root.host){return findCommonOffsetParent(element1root.host,element2)}else{return findCommonOffsetParent(element1,getRoot(element2).host)}}/**
 * Gets the scroll value of the given element in the given side (top and left)
 * @method
 * @memberof Popper.Utils
 * @argument {Element} element
 * @argument {String} side `top` or `left`
 * @returns {number} amount of scrolled pixels
 */function getScroll(element){var side=1<arguments.length&&arguments[1]!==void 0?arguments[1]:"top",upperSide="top"===side?"scrollTop":"scrollLeft",nodeName=element.nodeName;if("BODY"===nodeName||"HTML"===nodeName){var html=window.document.documentElement,scrollingElement=window.document.scrollingElement||html;return scrollingElement[upperSide]}return element[upperSide]}/*
 * Sum or subtract the element scroll values (left and top) from a given rect object
 * @method
 * @memberof Popper.Utils
 * @param {Object} rect - Rect object you want to change
 * @param {HTMLElement} element - The element from the function reads the scroll values
 * @param {Boolean} subtract - set to true if you want to subtract the scroll values
 * @return {Object} rect - The modifier rect object
 */function includeScroll(rect,element){var subtract=2<arguments.length&&arguments[2]!==void 0?arguments[2]:!1,scrollTop=getScroll(element,"top"),scrollLeft=getScroll(element,"left"),modifier=subtract?-1:1;rect.top+=scrollTop*modifier;rect.bottom+=scrollTop*modifier;rect.left+=scrollLeft*modifier;rect.right+=scrollLeft*modifier;return rect}/*
 * Helper to detect borders of a given element
 * @method
 * @memberof Popper.Utils
 * @param {CSSStyleDeclaration} styles
 * Result of `getStyleComputedProperty` on the given element
 * @param {String} axis - `x` or `y`
 * @return {number} borders - The borders size of the given axis
 */function getBordersSize(styles,axis){var sideA="x"===axis?"Left":"Top",sideB="Left"===sideA?"Right":"Bottom";return+styles["border"+sideA+"Width"].split("px")[0]+ +styles["border"+sideB+"Width"].split("px")[0]}/**
 * Tells if you are running Internet Explorer 10
 * @method
 * @memberof Popper.Utils
 * @returns {Boolean} isIE10
 */var isIE10=void 0,isIE10$1=function(){if(isIE10===void 0){isIE10=-1!==navigator.appVersion.indexOf("MSIE 10")}return isIE10};function getSize(axis,body,html,computedStyle){return Math.max(body["offset"+axis],body["scroll"+axis],html["client"+axis],html["offset"+axis],html["scroll"+axis],isIE10$1()?html["offset"+axis]+computedStyle["margin"+("Height"===axis?"Top":"Left")]+computedStyle["margin"+("Height"===axis?"Bottom":"Right")]:0)}function getWindowSizes(){var body=window.document.body,html=window.document.documentElement,computedStyle=isIE10$1()&&window.getComputedStyle(html);return{height:getSize("Height",body,html,computedStyle),width:getSize("Width",body,html,computedStyle)}}var classCallCheck=function(instance,Constructor){if(!(instance instanceof Constructor)){throw new TypeError("Cannot call a class as a function")}},createClass=function(){function defineProperties(target,props){for(var i=0,descriptor;i<props.length;i++){descriptor=props[i];descriptor.enumerable=descriptor.enumerable||!1;descriptor.configurable=!0;if("value"in descriptor)descriptor.writable=!0;Object.defineProperty(target,descriptor.key,descriptor)}}return function(Constructor,protoProps,staticProps){if(protoProps)defineProperties(Constructor.prototype,protoProps);if(staticProps)defineProperties(Constructor,staticProps);return Constructor}}(),defineProperty=function(obj,key,value){if(key in obj){Object.defineProperty(obj,key,{value:value,enumerable:!0,configurable:!0,writable:!0})}else{obj[key]=value}return obj},_extends=Object.assign||function(target){for(var i=1,source;i<arguments.length;i++){source=arguments[i];for(var key in source){if(Object.prototype.hasOwnProperty.call(source,key)){target[key]=source[key]}}}return target};/**
 * Given element offsets, generate an output similar to getBoundingClientRect
 * @method
 * @memberof Popper.Utils
 * @argument {Object} offsets
 * @returns {Object} ClientRect like output
 */function getClientRect(offsets){return _extends({},offsets,{right:offsets.left+offsets.width,bottom:offsets.top+offsets.height})}/**
 * Get bounding client rect of given element
 * @method
 * @memberof Popper.Utils
 * @param {HTMLElement} element
 * @return {Object} client rect
 */function getBoundingClientRect(element){var rect={};// IE10 10 FIX: Please, don't ask, the element isn't
// considered in DOM in some circumstances...
// This isn't reproducible in IE10 compatibility mode of IE11
if(isIE10$1()){try{rect=element.getBoundingClientRect();var scrollTop=getScroll(element,"top"),scrollLeft=getScroll(element,"left");rect.top+=scrollTop;rect.left+=scrollLeft;rect.bottom+=scrollTop;rect.right+=scrollLeft}catch(err){}}else{rect=element.getBoundingClientRect()}var result={left:rect.left,top:rect.top,width:rect.right-rect.left,height:rect.bottom-rect.top},sizes="HTML"===element.nodeName?getWindowSizes():{},width=sizes.width||element.clientWidth||result.right-result.left,height=sizes.height||element.clientHeight||result.bottom-result.top,horizScrollbar=element.offsetWidth-width,vertScrollbar=element.offsetHeight-height;// subtract scrollbar size from sizes
// if an hypothetical scrollbar is detected, we must be sure it's not a `border`
// we make this check conditional for performance reasons
if(horizScrollbar||vertScrollbar){var styles=getStyleComputedProperty(element);horizScrollbar-=getBordersSize(styles,"x");vertScrollbar-=getBordersSize(styles,"y");result.width-=horizScrollbar;result.height-=vertScrollbar}return getClientRect(result)}function getOffsetRectRelativeToArbitraryNode(children,parent){var isIE10=isIE10$1(),isHTML="HTML"===parent.nodeName,childrenRect=getBoundingClientRect(children),parentRect=getBoundingClientRect(parent),scrollParent=getScrollParent(children),styles=getStyleComputedProperty(parent),borderTopWidth=+styles.borderTopWidth.split("px")[0],borderLeftWidth=+styles.borderLeftWidth.split("px")[0],offsets=getClientRect({top:childrenRect.top-parentRect.top-borderTopWidth,left:childrenRect.left-parentRect.left-borderLeftWidth,width:childrenRect.width,height:childrenRect.height});offsets.marginTop=0;offsets.marginLeft=0;// Subtract margins of documentElement in case it's being used as parent
// we do this only on HTML because it's the only element that behaves
// differently when margins are applied to it. The margins are included in
// the box of the documentElement, in the other cases not.
if(!isIE10&&isHTML){var marginTop=+styles.marginTop.split("px")[0],marginLeft=+styles.marginLeft.split("px")[0];offsets.top-=borderTopWidth-marginTop;offsets.bottom-=borderTopWidth-marginTop;offsets.left-=borderLeftWidth-marginLeft;offsets.right-=borderLeftWidth-marginLeft;// Attach marginTop and marginLeft because in some circumstances we may need them
offsets.marginTop=marginTop;offsets.marginLeft=marginLeft}if(isIE10?parent.contains(scrollParent):parent===scrollParent&&"BODY"!==scrollParent.nodeName){offsets=includeScroll(offsets,parent)}return offsets}function getViewportOffsetRectRelativeToArtbitraryNode(element){var html=window.document.documentElement,relativeOffset=getOffsetRectRelativeToArbitraryNode(element,html),width=Math.max(html.clientWidth,window.innerWidth||0),height=Math.max(html.clientHeight,window.innerHeight||0),scrollTop=getScroll(html),scrollLeft=getScroll(html,"left"),offset={top:scrollTop-relativeOffset.top+relativeOffset.marginTop,left:scrollLeft-relativeOffset.left+relativeOffset.marginLeft,width:width,height:height};return getClientRect(offset)}/**
 * Check if the given element is fixed or is inside a fixed parent
 * @method
 * @memberof Popper.Utils
 * @argument {Element} element
 * @argument {Element} customContainer
 * @returns {Boolean} answer to "isFixed?"
 */function isFixed(element){var nodeName=element.nodeName;if("BODY"===nodeName||"HTML"===nodeName){return!1}if("fixed"===getStyleComputedProperty(element,"position")){return!0}return isFixed(getParentNode(element))}/**
 * Computed the boundaries limits and return them
 * @method
 * @memberof Popper.Utils
 * @param {HTMLElement} popper
 * @param {HTMLElement} reference
 * @param {number} padding
 * @param {HTMLElement} boundariesElement - Element used to define the boundaries
 * @returns {Object} Coordinates of the boundaries
 */function getBoundaries(popper,reference,padding,boundariesElement){// NOTE: 1 DOM access here
var boundaries={top:0,left:0},offsetParent=findCommonOffsetParent(popper,reference);// Handle viewport case
if("viewport"===boundariesElement){boundaries=getViewportOffsetRectRelativeToArtbitraryNode(offsetParent)}else{// Handle other cases based on DOM element used as boundaries
var boundariesNode=void 0;if("scrollParent"===boundariesElement){boundariesNode=getScrollParent(getParentNode(popper));if("BODY"===boundariesNode.nodeName){boundariesNode=window.document.documentElement}}else if("window"===boundariesElement){boundariesNode=window.document.documentElement}else{boundariesNode=boundariesElement}var offsets=getOffsetRectRelativeToArbitraryNode(boundariesNode,offsetParent);// In case of HTML, we need a different computation
if("HTML"===boundariesNode.nodeName&&!isFixed(offsetParent)){var _getWindowSizes=getWindowSizes(),height=_getWindowSizes.height,width=_getWindowSizes.width;boundaries.top+=offsets.top-offsets.marginTop;boundaries.bottom=height+offsets.top;boundaries.left+=offsets.left-offsets.marginLeft;boundaries.right=width+offsets.left}else{// for all the other DOM elements, this one is good
boundaries=offsets}}// Add paddings
boundaries.left+=padding;boundaries.top+=padding;boundaries.right-=padding;boundaries.bottom-=padding;return boundaries}function getArea(_ref){var width=_ref.width,height=_ref.height;return width*height}/**
 * Utility used to transform the `auto` placement to the placement with more
 * available space.
 * @method
 * @memberof Popper.Utils
 * @argument {Object} data - The data object generated by update method
 * @argument {Object} options - Modifiers configuration and options
 * @returns {Object} The data object, properly modified
 */function computeAutoPlacement(placement,refRect,popper,reference,boundariesElement){var padding=5<arguments.length&&arguments[5]!==void 0?arguments[5]:0;if(-1===placement.indexOf("auto")){return placement}var boundaries=getBoundaries(popper,reference,padding,boundariesElement),rects={top:{width:boundaries.width,height:refRect.top-boundaries.top},right:{width:boundaries.right-refRect.right,height:boundaries.height},bottom:{width:boundaries.width,height:boundaries.bottom-refRect.bottom},left:{width:refRect.left-boundaries.left,height:boundaries.height}},sortedAreas=Object.keys(rects).map(function(key){return _extends({key:key},rects[key],{area:getArea(rects[key])})}).sort(function(a,b){return b.area-a.area}),filteredAreas=sortedAreas.filter(function(_ref2){var width=_ref2.width,height=_ref2.height;return width>=popper.clientWidth&&height>=popper.clientHeight}),computedPlacement=0<filteredAreas.length?filteredAreas[0].key:sortedAreas[0].key,variation=placement.split("-")[1];return computedPlacement+(variation?"-"+variation:"")}/**
 * Get offsets to the reference element
 * @method
 * @memberof Popper.Utils
 * @param {Object} state
 * @param {Element} popper - the popper element
 * @param {Element} reference - the reference element (the popper will be relative to this)
 * @returns {Object} An object containing the offsets which will be applied to the popper
 */function getReferenceOffsets(state,popper,reference){var commonOffsetParent=findCommonOffsetParent(popper,reference);return getOffsetRectRelativeToArbitraryNode(reference,commonOffsetParent)}/**
 * Get the outer sizes of the given element (offset size + margins)
 * @method
 * @memberof Popper.Utils
 * @argument {Element} element
 * @returns {Object} object containing width and height properties
 */function getOuterSizes(element){var styles=window.getComputedStyle(element),x=parseFloat(styles.marginTop)+parseFloat(styles.marginBottom),y=parseFloat(styles.marginLeft)+parseFloat(styles.marginRight),result={width:element.offsetWidth+y,height:element.offsetHeight+x};return result}/**
 * Get the opposite placement of the given one
 * @method
 * @memberof Popper.Utils
 * @argument {String} placement
 * @returns {String} flipped placement
 */function getOppositePlacement(placement){var hash={left:"right",right:"left",bottom:"top",top:"bottom"};return placement.replace(/left|right|bottom|top/g,function(matched){return hash[matched]})}/**
 * Get offsets to the popper
 * @method
 * @memberof Popper.Utils
 * @param {Object} position - CSS position the Popper will get applied
 * @param {HTMLElement} popper - the popper element
 * @param {Object} referenceOffsets - the reference offsets (the popper will be relative to this)
 * @param {String} placement - one of the valid placement options
 * @returns {Object} popperOffsets - An object containing the offsets which will be applied to the popper
 */function getPopperOffsets(popper,referenceOffsets,placement){placement=placement.split("-")[0];// Get popper node sizes
var popperRect=getOuterSizes(popper),popperOffsets={width:popperRect.width,height:popperRect.height},isHoriz=-1!==["right","left"].indexOf(placement),mainSide=isHoriz?"top":"left",secondarySide=isHoriz?"left":"top",measurement=isHoriz?"height":"width",secondaryMeasurement=!isHoriz?"height":"width";// Add position, width and height to our offsets object
popperOffsets[mainSide]=referenceOffsets[mainSide]+referenceOffsets[measurement]/2-popperRect[measurement]/2;if(placement===secondarySide){popperOffsets[secondarySide]=referenceOffsets[secondarySide]-popperRect[secondaryMeasurement]}else{popperOffsets[secondarySide]=referenceOffsets[getOppositePlacement(secondarySide)]}return popperOffsets}/**
 * Mimics the `find` method of Array
 * @method
 * @memberof Popper.Utils
 * @argument {Array} arr
 * @argument prop
 * @argument value
 * @returns index or -1
 */function find(arr,check){// use native find if supported
if(Array.prototype.find){return arr.find(check)}// use `filter` to obtain the same behavior of `find`
return arr.filter(check)[0]}/**
 * Return the index of the matching object
 * @method
 * @memberof Popper.Utils
 * @argument {Array} arr
 * @argument prop
 * @argument value
 * @returns index or -1
 */function findIndex(arr,prop,value){// use native findIndex if supported
if(Array.prototype.findIndex){return arr.findIndex(function(cur){return cur[prop]===value})}// use `find` + `indexOf` if `findIndex` isn't supported
var match=find(arr,function(obj){return obj[prop]===value});return arr.indexOf(match)}/**
 * Loop trough the list of modifiers and run them in order,
 * each of them will then edit the data object.
 * @method
 * @memberof Popper.Utils
 * @param {dataObject} data
 * @param {Array} modifiers
 * @param {String} ends - Optional modifier name used as stopper
 * @returns {dataObject}
 */function runModifiers(modifiers,data,ends){var modifiersToRun=ends===void 0?modifiers:modifiers.slice(0,findIndex(modifiers,"name",ends));modifiersToRun.forEach(function(modifier){if(modifier.function){console.warn("`modifier.function` is deprecated, use `modifier.fn`!")}var fn=modifier.function||modifier.fn;if(modifier.enabled&&isFunction(fn)){// Add properties to offsets to make them a complete clientRect object
// we do this before each modifier to make sure the previous one doesn't
// mess with these values
data.offsets.popper=getClientRect(data.offsets.popper);data.offsets.reference=getClientRect(data.offsets.reference);data=fn(data,modifier)}});return data}/**
 * Updates the position of the popper, computing the new offsets and applying
 * the new style.<br />
 * Prefer `scheduleUpdate` over `update` because of performance reasons.
 * @method
 * @memberof Popper
 */function update(){// if popper is destroyed, don't perform any further update
if(this.state.isDestroyed){return}var data={instance:this,styles:{},arrowStyles:{},attributes:{},flipped:!1,offsets:{}};// compute reference element offsets
data.offsets.reference=getReferenceOffsets(this.state,this.popper,this.reference);// compute auto placement, store placement inside the data object,
// modifiers will be able to edit `placement` if needed
// and refer to originalPlacement to know the original value
data.placement=computeAutoPlacement(this.options.placement,data.offsets.reference,this.popper,this.reference,this.options.modifiers.flip.boundariesElement,this.options.modifiers.flip.padding);// store the computed placement inside `originalPlacement`
data.originalPlacement=data.placement;// compute the popper offsets
data.offsets.popper=getPopperOffsets(this.popper,data.offsets.reference,data.placement);data.offsets.popper.position="absolute";// run the modifiers
data=runModifiers(this.modifiers,data);// the first `update` will call `onCreate` callback
// the other ones will call `onUpdate` callback
if(!this.state.isCreated){this.state.isCreated=!0;this.options.onCreate(data)}else{this.options.onUpdate(data)}}/**
 * Helper used to know if the given modifier is enabled.
 * @method
 * @memberof Popper.Utils
 * @returns {Boolean}
 */function isModifierEnabled(modifiers,modifierName){return modifiers.some(function(_ref){var name=_ref.name,enabled=_ref.enabled;return enabled&&name===modifierName})}/**
 * Get the prefixed supported property name
 * @method
 * @memberof Popper.Utils
 * @argument {String} property (camelCase)
 * @returns {String} prefixed property (camelCase or PascalCase, depending on the vendor prefix)
 */function getSupportedPropertyName(property){for(var prefixes=[!1,"ms","Webkit","Moz","O"],upperProp=property.charAt(0).toUpperCase()+property.slice(1),i=0;i<prefixes.length-1;i++){var prefix=prefixes[i],toCheck=prefix?""+prefix+upperProp:property;if("undefined"!==typeof window.document.body.style[toCheck]){return toCheck}}return null}/**
 * Destroy the popper
 * @method
 * @memberof Popper
 */function destroy(){this.state.isDestroyed=!0;// touch DOM only if `applyStyle` modifier is enabled
if(isModifierEnabled(this.modifiers,"applyStyle")){this.popper.removeAttribute("x-placement");this.popper.style.left="";this.popper.style.position="";this.popper.style.top="";this.popper.style[getSupportedPropertyName("transform")]=""}this.disableEventListeners();// remove the popper if user explicity asked for the deletion on destroy
// do not use `remove` because IE11 doesn't support it
if(this.options.removeOnDestroy){this.popper.parentNode.removeChild(this.popper)}return this}function attachToScrollParents(scrollParent,event,callback,scrollParents){var isBody="BODY"===scrollParent.nodeName,target=isBody?window:scrollParent;target.addEventListener(event,callback,{passive:!0});if(!isBody){attachToScrollParents(getScrollParent(target.parentNode),event,callback,scrollParents)}scrollParents.push(target)}/**
 * Setup needed event listeners used to update the popper position
 * @method
 * @memberof Popper.Utils
 * @private
 */function setupEventListeners(reference,options,state,updateBound){// Resize event listener on window
state.updateBound=updateBound;window.addEventListener("resize",state.updateBound,{passive:!0});// Scroll event listener on scroll parents
var scrollElement=getScrollParent(reference);attachToScrollParents(scrollElement,"scroll",state.updateBound,state.scrollParents);state.scrollElement=scrollElement;state.eventsEnabled=!0;return state}/**
 * It will add resize/scroll events and start recalculating
 * position of the popper element when they are triggered.
 * @method
 * @memberof Popper
 */function enableEventListeners(){if(!this.state.eventsEnabled){this.state=setupEventListeners(this.reference,this.options,this.state,this.scheduleUpdate)}}/**
 * Remove event listeners used to update the popper position
 * @method
 * @memberof Popper.Utils
 * @private
 */function removeEventListeners(reference,state){// Remove resize event listener on window
window.removeEventListener("resize",state.updateBound);// Remove scroll event listener on scroll parents
state.scrollParents.forEach(function(target){target.removeEventListener("scroll",state.updateBound)});// Reset state
state.updateBound=null;state.scrollParents=[];state.scrollElement=null;state.eventsEnabled=!1;return state}/**
 * It will remove resize/scroll events and won't recalculate popper position
 * when they are triggered. It also won't trigger onUpdate callback anymore,
 * unless you call `update` method manually.
 * @method
 * @memberof Popper
 */function disableEventListeners(){if(this.state.eventsEnabled){window.cancelAnimationFrame(this.scheduleUpdate);this.state=removeEventListeners(this.reference,this.state)}}/**
 * Tells if a given input is a number
 * @method
 * @memberof Popper.Utils
 * @param {*} input to check
 * @return {Boolean}
 */function isNumeric(n){return""!==n&&!isNaN(parseFloat(n))&&isFinite(n)}/**
 * Set the style to the given popper
 * @method
 * @memberof Popper.Utils
 * @argument {Element} element - Element to apply the style to
 * @argument {Object} styles
 * Object with a list of properties and values which will be applied to the element
 */function setStyles(element,styles){Object.keys(styles).forEach(function(prop){var unit="";// add unit if the value is numeric and is one of the following
if(-1!==["width","height","top","right","bottom","left"].indexOf(prop)&&isNumeric(styles[prop])){unit="px"}element.style[prop]=styles[prop]+unit})}/**
 * Set the attributes to the given popper
 * @method
 * @memberof Popper.Utils
 * @argument {Element} element - Element to apply the attributes to
 * @argument {Object} styles
 * Object with a list of properties and values which will be applied to the element
 */function setAttributes(element,attributes){Object.keys(attributes).forEach(function(prop){var value=attributes[prop];if(!1!==value){element.setAttribute(prop,attributes[prop])}else{element.removeAttribute(prop)}})}/**
 * @function
 * @memberof Modifiers
 * @argument {Object} data - The data object generated by `update` method
 * @argument {Object} data.styles - List of style properties - values to apply to popper element
 * @argument {Object} data.attributes - List of attribute properties - values to apply to popper element
 * @argument {Object} options - Modifiers configuration and options
 * @returns {Object} The same data object
 */function applyStyle(data){// any property present in `data.styles` will be applied to the popper,
// in this way we can make the 3rd party modifiers add custom styles to it
// Be aware, modifiers could override the properties defined in the previous
// lines of this modifier!
setStyles(data.instance.popper,data.styles);// any property present in `data.attributes` will be applied to the popper,
// they will be set as HTML attributes of the element
setAttributes(data.instance.popper,data.attributes);// if arrowElement is defined and arrowStyles has some properties
if(data.arrowElement&&Object.keys(data.arrowStyles).length){setStyles(data.arrowElement,data.arrowStyles)}return data}/**
 * Set the x-placement attribute before everything else because it could be used
 * to add margins to the popper margins needs to be calculated to get the
 * correct popper offsets.
 * @method
 * @memberof Popper.modifiers
 * @param {HTMLElement} reference - The reference element used to position the popper
 * @param {HTMLElement} popper - The HTML element used as popper.
 * @param {Object} options - Popper.js options
 */function applyStyleOnLoad(reference,popper,options,modifierOptions,state){// compute reference element offsets
var referenceOffsets=getReferenceOffsets(state,popper,reference),placement=computeAutoPlacement(options.placement,referenceOffsets,popper,reference,options.modifiers.flip.boundariesElement,options.modifiers.flip.padding);// compute auto placement, store placement inside the data object,
// modifiers will be able to edit `placement` if needed
// and refer to originalPlacement to know the original value
popper.setAttribute("x-placement",placement);// Apply `position` to popper before anything else because
// without the position applied we can't guarantee correct computations
setStyles(popper,{position:"absolute"});return options}/**
 * @function
 * @memberof Modifiers
 * @argument {Object} data - The data object generated by `update` method
 * @argument {Object} options - Modifiers configuration and options
 * @returns {Object} The data object, properly modified
 */function computeStyle(data,options){var x=options.x,y=options.y,popper=data.offsets.popper,legacyGpuAccelerationOption=find(data.instance.modifiers,function(modifier){return"applyStyle"===modifier.name}).gpuAcceleration;if(legacyGpuAccelerationOption!==void 0){console.warn("WARNING: `gpuAcceleration` option moved to `computeStyle` modifier and will not be supported in future versions of Popper.js!")}var gpuAcceleration=legacyGpuAccelerationOption!==void 0?legacyGpuAccelerationOption:options.gpuAcceleration,offsetParent=getOffsetParent(data.instance.popper),offsetParentRect=getBoundingClientRect(offsetParent),styles={position:popper.position},offsets={left:Math.floor(popper.left),top:Math.floor(popper.top),bottom:Math.floor(popper.bottom),right:Math.floor(popper.right)},sideA="bottom"===x?"top":"bottom",sideB="right"===y?"left":"right",prefixedProperty=getSupportedPropertyName("transform"),left=void 0,top=void 0;if("bottom"===sideA){top=-offsetParentRect.height+offsets.bottom}else{top=offsets.top}if("right"===sideB){left=-offsetParentRect.width+offsets.right}else{left=offsets.left}if(gpuAcceleration&&prefixedProperty){styles[prefixedProperty]="translate3d("+left+"px, "+top+"px, 0)";styles[sideA]=0;styles[sideB]=0;styles.willChange="transform"}else{// othwerise, we use the standard `top`, `left`, `bottom` and `right` properties
var invertTop="bottom"===sideA?-1:1,invertLeft="right"===sideB?-1:1;styles[sideA]=top*invertTop;styles[sideB]=left*invertLeft;styles.willChange=sideA+", "+sideB}// Attributes
var attributes={"x-placement":data.placement};// Update `data` attributes, styles and arrowStyles
data.attributes=_extends({},attributes,data.attributes);data.styles=_extends({},styles,data.styles);data.arrowStyles=_extends({},data.offsets.arrow,data.arrowStyles);return data}/**
 * Helper used to know if the given modifier depends from another one.<br />
 * It checks if the needed modifier is listed and enabled.
 * @method
 * @memberof Popper.Utils
 * @param {Array} modifiers - list of modifiers
 * @param {String} requestingName - name of requesting modifier
 * @param {String} requestedName - name of requested modifier
 * @returns {Boolean}
 */function isModifierRequired(modifiers,requestingName,requestedName){var requesting=find(modifiers,function(_ref){var name=_ref.name;return name===requestingName}),isRequired=!!requesting&&modifiers.some(function(modifier){return modifier.name===requestedName&&modifier.enabled&&modifier.order<requesting.order});if(!isRequired){var _requesting="`"+requestingName+"`",requested="`"+requestedName+"`";console.warn(requested+" modifier is required by "+_requesting+" modifier in order to work, be sure to include it before "+_requesting+"!")}return isRequired}/**
 * @function
 * @memberof Modifiers
 * @argument {Object} data - The data object generated by update method
 * @argument {Object} options - Modifiers configuration and options
 * @returns {Object} The data object, properly modified
 */function arrow(data,options){// arrow depends on keepTogether in order to work
if(!isModifierRequired(data.instance.modifiers,"arrow","keepTogether")){return data}var arrowElement=options.element;// if arrowElement is a string, suppose it's a CSS selector
if("string"===typeof arrowElement){arrowElement=data.instance.popper.querySelector(arrowElement);// if arrowElement is not found, don't run the modifier
if(!arrowElement){return data}}else{// if the arrowElement isn't a query selector we must check that the
// provided DOM node is child of its popper node
if(!data.instance.popper.contains(arrowElement)){console.warn("WARNING: `arrow.element` must be child of its popper element!");return data}}var placement=data.placement.split("-")[0],_data$offsets=data.offsets,popper=_data$offsets.popper,reference=_data$offsets.reference,isVertical=-1!==["left","right"].indexOf(placement),len=isVertical?"height":"width",sideCapitalized=isVertical?"Top":"Left",side=sideCapitalized.toLowerCase(),altSide=isVertical?"left":"top",opSide=isVertical?"bottom":"right",arrowElementSize=getOuterSizes(arrowElement)[len];//
// extends keepTogether behavior making sure the popper and its
// reference have enough pixels in conjuction
//
// top/left side
if(reference[opSide]-arrowElementSize<popper[side]){data.offsets.popper[side]-=popper[side]-(reference[opSide]-arrowElementSize)}// bottom/right side
if(reference[side]+arrowElementSize>popper[opSide]){data.offsets.popper[side]+=reference[side]+arrowElementSize-popper[opSide]}// compute center of the popper
var center=reference[side]+reference[len]/2-arrowElementSize/2,popperMarginSide=getStyleComputedProperty(data.instance.popper,"margin"+sideCapitalized).replace("px",""),sideValue=center-getClientRect(data.offsets.popper)[side]-popperMarginSide;// Compute the sideValue using the updated popper offsets
// take popper margin in account because we don't have this info available
// prevent arrowElement from being placed not contiguously to its popper
sideValue=Math.max(Math.min(popper[len]-arrowElementSize,sideValue),0);data.arrowElement=arrowElement;data.offsets.arrow={};data.offsets.arrow[side]=Math.round(sideValue);data.offsets.arrow[altSide]="";// make sure to unset any eventual altSide value from the DOM node
return data}/**
 * Get the opposite placement variation of the given one
 * @method
 * @memberof Popper.Utils
 * @argument {String} placement variation
 * @returns {String} flipped placement variation
 */function getOppositeVariation(variation){if("end"===variation){return"start"}else if("start"===variation){return"end"}return variation}/**
 * List of accepted placements to use as values of the `placement` option.<br />
 * Valid placements are:
 * - `auto`
 * - `top`
 * - `right`
 * - `bottom`
 * - `left`
 *
 * Each placement can have a variation from this list:
 * - `-start`
 * - `-end`
 *
 * Variations are interpreted easily if you think of them as the left to right
 * written languages. Horizontally (`top` and `bottom`), `start` is left and `end`
 * is right.<br />
 * Vertically (`left` and `right`), `start` is top and `end` is bottom.
 *
 * Some valid examples are:
 * - `top-end` (on top of reference, right aligned)
 * - `right-start` (on right of reference, top aligned)
 * - `bottom` (on bottom, centered)
 * - `auto-right` (on the side with more space available, alignment depends by placement)
 *
 * @static
 * @type {Array}
 * @enum {String}
 * @readonly
 * @method placements
 * @memberof Popper
 */var placements=["auto-start","auto","auto-end","top-start","top","top-end","right-start","right","right-end","bottom-end","bottom","bottom-start","left-end","left","left-start"],validPlacements=placements.slice(3);// Get rid of `auto` `auto-start` and `auto-end`
/**
 * Given an initial placement, returns all the subsequent placements
 * clockwise (or counter-clockwise).
 *
 * @method
 * @memberof Popper.Utils
 * @argument {String} placement - A valid placement (it accepts variations)
 * @argument {Boolean} counter - Set to true to walk the placements counterclockwise
 * @returns {Array} placements including their variations
 */function clockwise(placement){var counter=1<arguments.length&&arguments[1]!==void 0?arguments[1]:!1,index=validPlacements.indexOf(placement),arr=validPlacements.slice(index+1).concat(validPlacements.slice(0,index));return counter?arr.reverse():arr}var BEHAVIORS={FLIP:"flip",CLOCKWISE:"clockwise",COUNTERCLOCKWISE:"counterclockwise"};/**
 * @function
 * @memberof Modifiers
 * @argument {Object} data - The data object generated by update method
 * @argument {Object} options - Modifiers configuration and options
 * @returns {Object} The data object, properly modified
 */function flip(data,options){// if `inner` modifier is enabled, we can't use the `flip` modifier
if(isModifierEnabled(data.instance.modifiers,"inner")){return data}if(data.flipped&&data.placement===data.originalPlacement){// seems like flip is trying to loop, probably there's not enough space on any of the flippable sides
return data}var boundaries=getBoundaries(data.instance.popper,data.instance.reference,options.padding,options.boundariesElement),placement=data.placement.split("-")[0],placementOpposite=getOppositePlacement(placement),variation=data.placement.split("-")[1]||"",flipOrder=[];switch(options.behavior){case BEHAVIORS.FLIP:flipOrder=[placement,placementOpposite];break;case BEHAVIORS.CLOCKWISE:flipOrder=clockwise(placement);break;case BEHAVIORS.COUNTERCLOCKWISE:flipOrder=clockwise(placement,!0);break;default:flipOrder=options.behavior;}flipOrder.forEach(function(step,index){if(placement!==step||flipOrder.length===index+1){return data}placement=data.placement.split("-")[0];placementOpposite=getOppositePlacement(placement);var popperOffsets=data.offsets.popper,refOffsets=data.offsets.reference,floor=Math.floor,overlapsRef="left"===placement&&floor(popperOffsets.right)>floor(refOffsets.left)||"right"===placement&&floor(popperOffsets.left)<floor(refOffsets.right)||"top"===placement&&floor(popperOffsets.bottom)>floor(refOffsets.top)||"bottom"===placement&&floor(popperOffsets.top)<floor(refOffsets.bottom),overflowsLeft=floor(popperOffsets.left)<floor(boundaries.left),overflowsRight=floor(popperOffsets.right)>floor(boundaries.right),overflowsTop=floor(popperOffsets.top)<floor(boundaries.top),overflowsBottom=floor(popperOffsets.bottom)>floor(boundaries.bottom),overflowsBoundaries="left"===placement&&overflowsLeft||"right"===placement&&overflowsRight||"top"===placement&&overflowsTop||"bottom"===placement&&overflowsBottom,isVertical=-1!==["top","bottom"].indexOf(placement),flippedVariation=!!options.flipVariations&&(isVertical&&"start"===variation&&overflowsLeft||isVertical&&"end"===variation&&overflowsRight||!isVertical&&"start"===variation&&overflowsTop||!isVertical&&"end"===variation&&overflowsBottom);if(overlapsRef||overflowsBoundaries||flippedVariation){// this boolean to detect any flip loop
data.flipped=!0;if(overlapsRef||overflowsBoundaries){placement=flipOrder[index+1]}if(flippedVariation){variation=getOppositeVariation(variation)}data.placement=placement+(variation?"-"+variation:"");// this object contains `position`, we want to preserve it along with
// any additional property we may add in the future
data.offsets.popper=_extends({},data.offsets.popper,getPopperOffsets(data.instance.popper,data.offsets.reference,data.placement));data=runModifiers(data.instance.modifiers,data,"flip")}});return data}/**
 * @function
 * @memberof Modifiers
 * @argument {Object} data - The data object generated by update method
 * @argument {Object} options - Modifiers configuration and options
 * @returns {Object} The data object, properly modified
 */function keepTogether(data){var _data$offsets=data.offsets,popper=_data$offsets.popper,reference=_data$offsets.reference,placement=data.placement.split("-")[0],floor=Math.floor,isVertical=-1!==["top","bottom"].indexOf(placement),side=isVertical?"right":"bottom",opSide=isVertical?"left":"top",measurement=isVertical?"width":"height";if(popper[side]<floor(reference[opSide])){data.offsets.popper[opSide]=floor(reference[opSide])-popper[measurement]}if(popper[opSide]>floor(reference[side])){data.offsets.popper[opSide]=floor(reference[side])}return data}/**
 * Converts a string containing value + unit into a px value number
 * @function
 * @memberof {modifiers~offset}
 * @private
 * @argument {String} str - Value + unit string
 * @argument {String} measurement - `height` or `width`
 * @argument {Object} popperOffsets
 * @argument {Object} referenceOffsets
 * @returns {Number|String}
 * Value in pixels, or original string if no values were extracted
 */function toValue(str,measurement,popperOffsets,referenceOffsets){// separate value from unit
var split=str.match(/((?:\-|\+)?\d*\.?\d*)(.*)/),value=+split[1],unit=split[2];// If it's not a number it's an operator, I guess
if(!value){return str}if(0===unit.indexOf("%")){var element=void 0;switch(unit){case"%p":element=popperOffsets;break;case"%":case"%r":default:element=referenceOffsets;}var rect=getClientRect(element);return rect[measurement]/100*value}else if("vh"===unit||"vw"===unit){// if is a vh or vw, we calculate the size based on the viewport
var size=void 0;if("vh"===unit){size=Math.max(document.documentElement.clientHeight,window.innerHeight||0)}else{size=Math.max(document.documentElement.clientWidth,window.innerWidth||0)}return size/100*value}else{// if is an explicit pixel unit, we get rid of the unit and keep the value
// if is an implicit unit, it's px, and we return just the value
return value}}/**
 * Parse an `offset` string to extrapolate `x` and `y` numeric offsets.
 * @function
 * @memberof {modifiers~offset}
 * @private
 * @argument {String} offset
 * @argument {Object} popperOffsets
 * @argument {Object} referenceOffsets
 * @argument {String} basePlacement
 * @returns {Array} a two cells array with x and y offsets in numbers
 */function parseOffset(offset,popperOffsets,referenceOffsets,basePlacement){var offsets=[0,0],useHeight=-1!==["right","left"].indexOf(basePlacement),fragments=offset.split(/(\+|\-)/).map(function(frag){return frag.trim()}),divider=fragments.indexOf(find(fragments,function(frag){return-1!==frag.search(/,|\s/)}));// Use height if placement is left or right and index is 0 otherwise use width
// in this way the first offset will use an axis and the second one
// will use the other one
if(fragments[divider]&&-1===fragments[divider].indexOf(",")){console.warn("Offsets separated by white space(s) are deprecated, use a comma (,) instead.")}// If divider is found, we divide the list of values and operands to divide
// them by ofset X and Y.
var splitRegex=/\s*,\s*|\s+/,ops=-1!==divider?[fragments.slice(0,divider).concat([fragments[divider].split(splitRegex)[0]]),[fragments[divider].split(splitRegex)[1]].concat(fragments.slice(divider+1))]:[fragments];// Convert the values with units to absolute pixels to allow our computations
ops=ops.map(function(op,index){// Most of the units rely on the orientation of the popper
var measurement=(1===index?!useHeight:useHeight)?"height":"width",mergeWithPrevious=!1;return op// This aggregates any `+` or `-` sign that aren't considered operators
// e.g.: 10 + +5 => [10, +, +5]
.reduce(function(a,b){if(""===a[a.length-1]&&-1!==["+","-"].indexOf(b)){a[a.length-1]=b;mergeWithPrevious=!0;return a}else if(mergeWithPrevious){a[a.length-1]+=b;mergeWithPrevious=!1;return a}else{return a.concat(b)}},[])// Here we convert the string values into number values (in px)
.map(function(str){return toValue(str,measurement,popperOffsets,referenceOffsets)})});// Loop trough the offsets arrays and execute the operations
ops.forEach(function(op,index){op.forEach(function(frag,index2){if(isNumeric(frag)){offsets[index]+=frag*("-"===op[index2-1]?-1:1)}})});return offsets}/**
 * @function
 * @memberof Modifiers
 * @argument {Object} data - The data object generated by update method
 * @argument {Object} options - Modifiers configuration and options
 * @argument {Number|String} options.offset=0
 * The offset value as described in the modifier description
 * @returns {Object} The data object, properly modified
 */function offset(data,_ref){var offset=_ref.offset,placement=data.placement,_data$offsets=data.offsets,popper=_data$offsets.popper,reference=_data$offsets.reference,basePlacement=placement.split("-")[0],offsets=void 0;if(isNumeric(+offset)){offsets=[+offset,0]}else{offsets=parseOffset(offset,popper,reference,basePlacement)}if("left"===basePlacement){popper.top+=offsets[0];popper.left-=offsets[1]}else if("right"===basePlacement){popper.top+=offsets[0];popper.left+=offsets[1]}else if("top"===basePlacement){popper.left+=offsets[0];popper.top-=offsets[1]}else if("bottom"===basePlacement){popper.left+=offsets[0];popper.top+=offsets[1]}data.popper=popper;return data}/**
 * @function
 * @memberof Modifiers
 * @argument {Object} data - The data object generated by `update` method
 * @argument {Object} options - Modifiers configuration and options
 * @returns {Object} The data object, properly modified
 */function preventOverflow(data,options){var boundariesElement=options.boundariesElement||getOffsetParent(data.instance.popper);// If offsetParent is the reference element, we really want to
// go one step up and use the next offsetParent as reference to
// avoid to make this modifier completely useless and look like broken
if(data.instance.reference===boundariesElement){boundariesElement=getOffsetParent(boundariesElement)}var boundaries=getBoundaries(data.instance.popper,data.instance.reference,options.padding,boundariesElement);options.boundaries=boundaries;var order=options.priority,popper=data.offsets.popper,check={primary:function primary(placement){var value=popper[placement];if(popper[placement]<boundaries[placement]&&!options.escapeWithReference){value=Math.max(popper[placement],boundaries[placement])}return defineProperty({},placement,value)},secondary:function secondary(placement){var mainSide="right"===placement?"left":"top",value=popper[mainSide];if(popper[placement]>boundaries[placement]&&!options.escapeWithReference){value=Math.min(popper[mainSide],boundaries[placement]-("right"===placement?popper.width:popper.height))}return defineProperty({},mainSide,value)}};order.forEach(function(placement){var side=-1!==["left","top"].indexOf(placement)?"primary":"secondary";popper=_extends({},popper,check[side](placement))});data.offsets.popper=popper;return data}/**
 * @function
 * @memberof Modifiers
 * @argument {Object} data - The data object generated by `update` method
 * @argument {Object} options - Modifiers configuration and options
 * @returns {Object} The data object, properly modified
 */function shift(data){var placement=data.placement,basePlacement=placement.split("-")[0],shiftvariation=placement.split("-")[1];// if shift shiftvariation is specified, run the modifier
if(shiftvariation){var _data$offsets=data.offsets,reference=_data$offsets.reference,popper=_data$offsets.popper,isVertical=-1!==["bottom","top"].indexOf(basePlacement),side=isVertical?"left":"top",measurement=isVertical?"width":"height",shiftOffsets={start:defineProperty({},side,reference[side]),end:defineProperty({},side,reference[side]+reference[measurement]-popper[measurement])};data.offsets.popper=_extends({},popper,shiftOffsets[shiftvariation])}return data}/**
 * @function
 * @memberof Modifiers
 * @argument {Object} data - The data object generated by update method
 * @argument {Object} options - Modifiers configuration and options
 * @returns {Object} The data object, properly modified
 */function hide(data){if(!isModifierRequired(data.instance.modifiers,"hide","preventOverflow")){return data}var refRect=data.offsets.reference,bound=find(data.instance.modifiers,function(modifier){return"preventOverflow"===modifier.name}).boundaries;if(refRect.bottom<bound.top||refRect.left>bound.right||refRect.top>bound.bottom||refRect.right<bound.left){// Avoid unnecessary DOM access if visibility hasn't changed
if(!0===data.hide){return data}data.hide=!0;data.attributes["x-out-of-boundaries"]=""}else{// Avoid unnecessary DOM access if visibility hasn't changed
if(!1===data.hide){return data}data.hide=!1;data.attributes["x-out-of-boundaries"]=!1}return data}/**
 * @function
 * @memberof Modifiers
 * @argument {Object} data - The data object generated by `update` method
 * @argument {Object} options - Modifiers configuration and options
 * @returns {Object} The data object, properly modified
 */function inner(data){var placement=data.placement,basePlacement=placement.split("-")[0],_data$offsets=data.offsets,popper=_data$offsets.popper,reference=_data$offsets.reference,isHoriz=-1!==["left","right"].indexOf(basePlacement),subtractLength=-1===["top","left"].indexOf(basePlacement);popper[isHoriz?"left":"top"]=reference[basePlacement]-(subtractLength?popper[isHoriz?"width":"height"]:0);data.placement=getOppositePlacement(placement);data.offsets.popper=getClientRect(popper);return data}/**
 * Modifier function, each modifier can have a function of this type assigned
 * to its `fn` property.<br />
 * These functions will be called on each update, this means that you must
 * make sure they are performant enough to avoid performance bottlenecks.
 *
 * @function ModifierFn
 * @argument {dataObject} data - The data object generated by `update` method
 * @argument {Object} options - Modifiers configuration and options
 * @returns {dataObject} The data object, properly modified
 */ /**
 * Modifiers are plugins used to alter the behavior of your poppers.<br />
 * Popper.js uses a set of 9 modifiers to provide all the basic functionalities
 * needed by the library.
 *
 * Usually you don't want to override the `order`, `fn` and `onLoad` props.
 * All the other properties are configurations that could be tweaked.
 * @namespace modifiers
 */var modifiers={/**
   * Modifier used to shift the popper on the start or end of its reference
   * element.<br />
   * It will read the variation of the `placement` property.<br />
   * It can be one either `-end` or `-start`.
   * @memberof modifiers
   * @inner
   */shift:{/** @prop {number} order=100 - Index used to define the order of execution */order:100,/** @prop {Boolean} enabled=true - Whether the modifier is enabled or not */enabled:!0,/** @prop {ModifierFn} */fn:shift},/**
   * The `offset` modifier can shift your popper on both its axis.
   *
   * It accepts the following units:
   * - `px` or unitless, interpreted as pixels
   * - `%` or `%r`, percentage relative to the length of the reference element
   * - `%p`, percentage relative to the length of the popper element
   * - `vw`, CSS viewport width unit
   * - `vh`, CSS viewport height unit
   *
   * For length is intended the main axis relative to the placement of the popper.<br />
   * This means that if the placement is `top` or `bottom`, the length will be the
   * `width`. In case of `left` or `right`, it will be the height.
   *
   * You can provide a single value (as `Number` or `String`), or a pair of values
   * as `String` divided by a comma or one (or more) white spaces.<br />
   * The latter is a deprecated method because it leads to confusion and will be
   * removed in v2.<br />
   * Additionally, it accepts additions and subtractions between different units.
   * Note that multiplications and divisions aren't supported.
   *
   * Valid examples are:
   * ```
   * 10
   * '10%'
   * '10, 10'
   * '10%, 10'
   * '10 + 10%'
   * '10 - 5vh + 3%'
   * '-10px + 5vh, 5px - 6%'
   * ```
   * > **NB**: If you desire to apply offsets to your poppers in a way that may make them overlap
   * > with their reference element, unfortunately, you will have to disable the `flip` modifier.
   * > More on this [reading this issue](https://github.com/FezVrasta/popper.js/issues/373)
   *
   * @memberof modifiers
   * @inner
   */offset:{/** @prop {number} order=200 - Index used to define the order of execution */order:200,/** @prop {Boolean} enabled=true - Whether the modifier is enabled or not */enabled:!0,/** @prop {ModifierFn} */fn:offset,/** @prop {Number|String} offset=0
     * The offset value as described in the modifier description
     */offset:0},/**
   * Modifier used to prevent the popper from being positioned outside the boundary.
   *
   * An scenario exists where the reference itself is not within the boundaries.<br />
   * We can say it has "escaped the boundaries" — or just "escaped".<br />
   * In this case we need to decide whether the popper should either:
   *
   * - detach from the reference and remain "trapped" in the boundaries, or
   * - if it should ignore the boundary and "escape with its reference"
   *
   * When `escapeWithReference` is set to`true` and reference is completely
   * outside its boundaries, the popper will overflow (or completely leave)
   * the boundaries in order to remain attached to the edge of the reference.
   *
   * @memberof modifiers
   * @inner
   */preventOverflow:{/** @prop {number} order=300 - Index used to define the order of execution */order:300,/** @prop {Boolean} enabled=true - Whether the modifier is enabled or not */enabled:!0,/** @prop {ModifierFn} */fn:preventOverflow,/**
     * @prop {Array} [priority=['left','right','top','bottom']]
     * Popper will try to prevent overflow following these priorities by default,
     * then, it could overflow on the left and on top of the `boundariesElement`
     */priority:["left","right","top","bottom"],/**
     * @prop {number} padding=5
     * Amount of pixel used to define a minimum distance between the boundaries
     * and the popper this makes sure the popper has always a little padding
     * between the edges of its container
     */padding:5,/**
     * @prop {String|HTMLElement} boundariesElement='scrollParent'
     * Boundaries used by the modifier, can be `scrollParent`, `window`,
     * `viewport` or any DOM element.
     */boundariesElement:"scrollParent"},/**
   * Modifier used to make sure the reference and its popper stay near eachothers
   * without leaving any gap between the two. Expecially useful when the arrow is
   * enabled and you want to assure it to point to its reference element.
   * It cares only about the first axis, you can still have poppers with margin
   * between the popper and its reference element.
   * @memberof modifiers
   * @inner
   */keepTogether:{/** @prop {number} order=400 - Index used to define the order of execution */order:400,/** @prop {Boolean} enabled=true - Whether the modifier is enabled or not */enabled:!0,/** @prop {ModifierFn} */fn:keepTogether},/**
   * This modifier is used to move the `arrowElement` of the popper to make
   * sure it is positioned between the reference element and its popper element.
   * It will read the outer size of the `arrowElement` node to detect how many
   * pixels of conjuction are needed.
   *
   * It has no effect if no `arrowElement` is provided.
   * @memberof modifiers
   * @inner
   */arrow:{/** @prop {number} order=500 - Index used to define the order of execution */order:500,/** @prop {Boolean} enabled=true - Whether the modifier is enabled or not */enabled:!0,/** @prop {ModifierFn} */fn:arrow,/** @prop {String|HTMLElement} element='[x-arrow]' - Selector or node used as arrow */element:"[x-arrow]"},/**
   * Modifier used to flip the popper's placement when it starts to overlap its
   * reference element.
   *
   * Requires the `preventOverflow` modifier before it in order to work.
   *
   * **NOTE:** this modifier will interrupt the current update cycle and will
   * restart it if it detects the need to flip the placement.
   * @memberof modifiers
   * @inner
   */flip:{/** @prop {number} order=600 - Index used to define the order of execution */order:600,/** @prop {Boolean} enabled=true - Whether the modifier is enabled or not */enabled:!0,/** @prop {ModifierFn} */fn:flip,/**
     * @prop {String|Array} behavior='flip'
     * The behavior used to change the popper's placement. It can be one of
     * `flip`, `clockwise`, `counterclockwise` or an array with a list of valid
     * placements (with optional variations).
     */behavior:"flip",/**
     * @prop {number} padding=5
     * The popper will flip if it hits the edges of the `boundariesElement`
     */padding:5,/**
     * @prop {String|HTMLElement} boundariesElement='viewport'
     * The element which will define the boundaries of the popper position,
     * the popper will never be placed outside of the defined boundaries
     * (except if keepTogether is enabled)
     */boundariesElement:"viewport"},/**
   * Modifier used to make the popper flow toward the inner of the reference element.
   * By default, when this modifier is disabled, the popper will be placed outside
   * the reference element.
   * @memberof modifiers
   * @inner
   */inner:{/** @prop {number} order=700 - Index used to define the order of execution */order:700,/** @prop {Boolean} enabled=false - Whether the modifier is enabled or not */enabled:!1,/** @prop {ModifierFn} */fn:inner},/**
   * Modifier used to hide the popper when its reference element is outside of the
   * popper boundaries. It will set a `x-out-of-boundaries` attribute which can
   * be used to hide with a CSS selector the popper when its reference is
   * out of boundaries.
   *
   * Requires the `preventOverflow` modifier before it in order to work.
   * @memberof modifiers
   * @inner
   */hide:{/** @prop {number} order=800 - Index used to define the order of execution */order:800,/** @prop {Boolean} enabled=true - Whether the modifier is enabled or not */enabled:!0,/** @prop {ModifierFn} */fn:hide},/**
   * Computes the style that will be applied to the popper element to gets
   * properly positioned.
   *
   * Note that this modifier will not touch the DOM, it just prepares the styles
   * so that `applyStyle` modifier can apply it. This separation is useful
   * in case you need to replace `applyStyle` with a custom implementation.
   *
   * This modifier has `850` as `order` value to maintain backward compatibility
   * with previous versions of Popper.js. Expect the modifiers ordering method
   * to change in future major versions of the library.
   *
   * @memberof modifiers
   * @inner
   */computeStyle:{/** @prop {number} order=850 - Index used to define the order of execution */order:850,/** @prop {Boolean} enabled=true - Whether the modifier is enabled or not */enabled:!0,/** @prop {ModifierFn} */fn:computeStyle,/**
     * @prop {Boolean} gpuAcceleration=true
     * If true, it uses the CSS 3d transformation to position the popper.
     * Otherwise, it will use the `top` and `left` properties.
     */gpuAcceleration:!0,/**
     * @prop {string} [x='bottom']
     * Where to anchor the X axis (`bottom` or `top`). AKA X offset origin.
     * Change this if your popper should grow in a direction different from `bottom`
     */x:"bottom",/**
     * @prop {string} [x='left']
     * Where to anchor the Y axis (`left` or `right`). AKA Y offset origin.
     * Change this if your popper should grow in a direction different from `right`
     */y:"right"},/**
   * Applies the computed styles to the popper element.
   *
   * All the DOM manipulations are limited to this modifier. This is useful in case
   * you want to integrate Popper.js inside a framework or view library and you
   * want to delegate all the DOM manipulations to it.
   *
   * Note that if you disable this modifier, you must make sure the popper element
   * has its position set to `absolute` before Popper.js can do its work!
   *
   * Just disable this modifier and define you own to achieve the desired effect.
   *
   * @memberof modifiers
   * @inner
   */applyStyle:{/** @prop {number} order=900 - Index used to define the order of execution */order:900,/** @prop {Boolean} enabled=true - Whether the modifier is enabled or not */enabled:!0,/** @prop {ModifierFn} */fn:applyStyle,/** @prop {Function} */onLoad:applyStyleOnLoad,/**
     * @deprecated since version 1.10.0, the property moved to `computeStyle` modifier
     * @prop {Boolean} gpuAcceleration=true
     * If true, it uses the CSS 3d transformation to position the popper.
     * Otherwise, it will use the `top` and `left` properties.
     */gpuAcceleration:void 0}},Defaults={/**
   * Popper's placement
   * @prop {Popper.placements} placement='bottom'
   */placement:"bottom",/**
   * Whether events (resize, scroll) are initially enabled
   * @prop {Boolean} eventsEnabled=true
   */eventsEnabled:!0,/**
   * Set to true if you want to automatically remove the popper when
   * you call the `destroy` method.
   * @prop {Boolean} removeOnDestroy=false
   */removeOnDestroy:!1,/**
   * Callback called when the popper is created.<br />
   * By default, is set to no-op.<br />
   * Access Popper.js instance with `data.instance`.
   * @prop {onCreate}
   */onCreate:function onCreate(){},/**
   * Callback called when the popper is updated, this callback is not called
   * on the initialization/creation of the popper, but only on subsequent
   * updates.<br />
   * By default, is set to no-op.<br />
   * Access Popper.js instance with `data.instance`.
   * @prop {onUpdate}
   */onUpdate:function onUpdate(){},/**
   * List of modifiers used to modify the offsets before they are applied to the popper.
   * They provide most of the functionalities of Popper.js
   * @prop {modifiers}
   */modifiers:modifiers},Popper=function(){/**
   * Create a new Popper.js instance
   * @class Popper
   * @param {HTMLElement|referenceObject} reference - The reference element used to position the popper
   * @param {HTMLElement} popper - The HTML element used as popper.
   * @param {Object} options - Your custom options to override the ones defined in [Defaults](#defaults)
   * @return {Object} instance - The generated Popper.js instance
   */function Popper(reference,popper){var _this=this,options=2<arguments.length&&arguments[2]!==void 0?arguments[2]:{};classCallCheck(this,Popper);this.scheduleUpdate=function(){return requestAnimationFrame(_this.update)};// make update() debounced, so that it only runs at most once-per-tick
this.update=debounce(this.update.bind(this));// with {} we create a new object with the options inside it
this.options=_extends({},Popper.Defaults,options);// init state
this.state={isDestroyed:!1,isCreated:!1,scrollParents:[]};// get reference and popper elements (allow jQuery wrappers)
this.reference=reference.jquery?reference[0]:reference;this.popper=popper.jquery?popper[0]:popper;// Deep merge modifiers options
this.options.modifiers={};Object.keys(_extends({},Popper.Defaults.modifiers,options.modifiers)).forEach(function(name){_this.options.modifiers[name]=_extends({},Popper.Defaults.modifiers[name]||{},options.modifiers?options.modifiers[name]:{})});// Refactoring modifiers' list (Object => Array)
this.modifiers=Object.keys(this.options.modifiers).map(function(name){return _extends({name:name},_this.options.modifiers[name])})// sort the modifiers by order
.sort(function(a,b){return a.order-b.order});// modifiers have the ability to execute arbitrary code when Popper.js get inited
// such code is executed in the same order of its modifier
// they could add new properties to their options configuration
// BE AWARE: don't add options to `options.modifiers.name` but to `modifierOptions`!
this.modifiers.forEach(function(modifierOptions){if(modifierOptions.enabled&&isFunction(modifierOptions.onLoad)){modifierOptions.onLoad(_this.reference,_this.popper,_this.options,modifierOptions,_this.state)}});// fire the first update to position the popper in the right place
this.update();var eventsEnabled=this.options.eventsEnabled;if(eventsEnabled){// setup event listeners, they will take care of update the position in specific situations
this.enableEventListeners()}this.state.eventsEnabled=eventsEnabled}// We can't use class properties because they don't get listed in the
// class prototype and break stuff like Sinon stubs
createClass(Popper,[{key:"update",value:function update$$1(){return update.call(this)}},{key:"destroy",value:function destroy$$1(){return destroy.call(this)}},{key:"enableEventListeners",value:function enableEventListeners$$1(){return enableEventListeners.call(this)}},{key:"disableEventListeners",value:function disableEventListeners$$1(){return disableEventListeners.call(this)}/**
     * Schedule an update, it will run on the next UI update available
     * @method scheduleUpdate
     * @memberof Popper
     */ /**
     * Collection of utilities useful when writing custom modifiers.
     * Starting from version 1.7, this method is available only if you
     * include `popper-utils.js` before `popper.js`.
     *
     * **DEPRECATION**: This way to access PopperUtils is deprecated
     * and will be removed in v2! Use the PopperUtils module directly instead.
     * Due to the high instability of the methods contained in Utils, we can't
     * guarantee them to follow semver. Use them at your own risk!
     * @static
     * @private
     * @type {Object}
     * @deprecated since version 1.8
     * @member Utils
     * @memberof Popper
     */}]);return Popper}();/**
 * The `dataObject` is an object containing all the informations used by Popper.js
 * this object get passed to modifiers and to the `onCreate` and `onUpdate` callbacks.
 * @name dataObject
 * @property {Object} data.instance The Popper.js instance
 * @property {String} data.placement Placement applied to popper
 * @property {String} data.originalPlacement Placement originally defined on init
 * @property {Boolean} data.flipped True if popper has been flipped by flip modifier
 * @property {Boolean} data.hide True if the reference element is out of boundaries, useful to know when to hide the popper.
 * @property {HTMLElement} data.arrowElement Node used as arrow by arrow modifier
 * @property {Object} data.styles Any CSS property defined here will be applied to the popper, it expects the JavaScript nomenclature (eg. `marginBottom`)
 * @property {Object} data.arrowStyles Any CSS property defined here will be applied to the popper arrow, it expects the JavaScript nomenclature (eg. `marginBottom`)
 * @property {Object} data.boundaries Offsets of the popper boundaries
 * @property {Object} data.offsets The measurements of popper, reference and arrow elements.
 * @property {Object} data.offsets.popper `top`, `left`, `width`, `height` values
 * @property {Object} data.offsets.reference `top`, `left`, `width`, `height` values
 * @property {Object} data.offsets.arrow] `top` and `left` offsets, only one of them will be different from 0
 */ /**
 * Default options provided to Popper.js constructor.<br />
 * These can be overriden using the `options` argument of Popper.js.<br />
 * To override an option, simply pass as 3rd argument an object with the same
 * structure of this object, example:
 * ```
 * new Popper(ref, pop, {
 *   modifiers: {
 *     preventOverflow: { enabled: false }
 *   }
 * })
 * ```
 * @type {Object}
 * @static
 * @memberof Popper
 */ /**
 * The `referenceObject` is an object that provides an interface compatible with Popper.js
 * and lets you use it as replacement of a real DOM node.<br />
 * You can use this method to position a popper relatively to a set of coordinates
 * in case you don't have a DOM node to use as reference.
 *
 * ```
 * new Popper(referenceObject, popperNode);
 * ```
 *
 * NB: This feature isn't supported in Internet Explorer 10
 * @name referenceObject
 * @property {Function} data.getBoundingClientRect
 * A function that returns a set of coordinates compatible with the native `getBoundingClientRect` method.
 * @property {number} data.clientWidth
 * An ES6 getter that will return the width of the virtual reference element.
 * @property {number} data.clientHeight
 * An ES6 getter that will return the height of the virtual reference element.
 */Popper.Utils=("undefined"!==typeof window?window:global).PopperUtils;Popper.placements=placements;Popper.Defaults=Defaults;return Popper});//# sourceMappingURL=popper.js.map