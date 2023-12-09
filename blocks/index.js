/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/edit.js":
/*!*********************!*\
  !*** ./src/edit.js ***!
  \*********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Edit)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _index_css__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./index.css */ "./src/index.css");
/* harmony import */ var _editor_css__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./editor.css */ "./src/editor.css");

/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */


/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */


/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */


/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */

const currentDate = new Date();
const formattedDate = currentDate.toLocaleDateString('en-US', {
  year: 'numeric',
  month: 'long',
  day: 'numeric'
});
// Example structure for each timeline item
const timelineItemDefault = {
  timelineIcon: 'dashicons-admin-post',
  formattedDate: formattedDate,
  postThumbnail: '',
  // Default image URL
  postTitle: 'timeline title',
  postContent: `Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.`
};
const dashiconString = "dashicons-before,dashicons-admin-appearance,dashicons-admin-collapse,dashicons-admin-comments,dashicons-admin-customizer,dashicons-admin-generic,dashicons-admin-home,dashicons-admin-links,dashicons-admin-media,dashicons-admin-multisite,dashicons-admin-network,dashicons-admin-page,dashicons-admin-plugins,dashicons-admin-post,dashicons-admin-settings,dashicons-admin-site-alt,dashicons-admin-site-alt2,dashicons-admin-site-alt3,dashicons-admin-site,dashicons-admin-tools,dashicons-admin-users,dashicons-airplane,dashicons-album,dashicons-align-center,dashicons-align-full-width,dashicons-align-left,dashicons-align-none,dashicons-align-pull-left,dashicons-align-pull-right,dashicons-align-right,dashicons-align-wide,dashicons-amazon,dashicons-analytics,dashicons-archive,dashicons-arrow-down-alt,dashicons-arrow-down-alt2,dashicons-arrow-down,dashicons-arrow-left-alt,dashicons-arrow-left-alt2,dashicons-arrow-left,dashicons-arrow-right-alt,dashicons-arrow-right-alt2,dashicons-arrow-right,dashicons-arrow-up-alt,dashicons-arrow-up-alt2,dashicons-arrow-up-duplicate,dashicons-arrow-up,dashicons-art,dashicons-awards,dashicons-backup,dashicons-bank,dashicons-beer,dashicons-bell,dashicons-block-default,dashicons-book-alt,dashicons-book,dashicons-buddicons-activity,dashicons-buddicons-bbpress-logo,dashicons-buddicons-buddypress-logo,dashicons-buddicons-community,dashicons-buddicons-forums,dashicons-buddicons-friends,dashicons-buddicons-groups,dashicons-buddicons-pm,dashicons-buddicons-replies,dashicons-buddicons-topics,dashicons-buddicons-tracking,dashicons-building,dashicons-businessman,dashicons-businessperson,dashicons-businesswoman,dashicons-button,dashicons-calculator,dashicons-calendar-alt,dashicons-calendar,dashicons-camera-alt,dashicons-camera,dashicons-car,dashicons-carrot,dashicons-cart,dashicons-category,dashicons-chart-area,dashicons-chart-bar,dashicons-chart-line,dashicons-chart-pie,dashicons-clipboard,dashicons-clock,dashicons-cloud-saved,dashicons-cloud-upload,dashicons-cloud,dashicons-code-standards,dashicons-coffee,dashicons-color-picker,dashicons-columns,dashicons-controls-back,dashicons-controls-forward,dashicons-controls-pause,dashicons-controls-play,dashicons-controls-repeat,dashicons-controls-skipback,dashicons-controls-skipforward,dashicons-controls-volumeoff,dashicons-controls-volumeon,dashicons-cover-image,dashicons-dashboard,dashicons-database-add,dashicons-database-export,dashicons-database-import,dashicons-database-remove,dashicons-database-view,dashicons-database,dashicons-desktop,dashicons-dismiss,dashicons-download,dashicons-drumstick,dashicons-edit-large,dashicons-edit-page,dashicons-edit,dashicons-editor-aligncenter,dashicons-editor-alignleft,dashicons-editor-alignright,dashicons-editor-bold,dashicons-editor-break,dashicons-editor-code-duplicate,dashicons-editor-code,dashicons-editor-contract,dashicons-editor-customchar,dashicons-editor-expand,dashicons-editor-help,dashicons-editor-indent,dashicons-editor-insertmore,dashicons-editor-italic,dashicons-editor-justify,dashicons-editor-kitchensink,dashicons-editor-ltr,dashicons-editor-ol-rtl,dashicons-editor-ol,dashicons-editor-outdent,dashicons-editor-paragraph,dashicons-editor-paste-text,dashicons-editor-paste-word,dashicons-editor-quote,dashicons-editor-removeformatting,dashicons-editor-rtl,dashicons-editor-spellcheck,dashicons-editor-strikethrough,dashicons-editor-table,dashicons-editor-textcolor,dashicons-editor-ul,dashicons-editor-underline,dashicons-editor-unlink,dashicons-editor-video,dashicons-ellipsis,dashicons-email-alt,dashicons-email-alt2,dashicons-email,dashicons-embed-audio,dashicons-embed-generic,dashicons-embed-photo,dashicons-embed-post,dashicons-embed-video,dashicons-excerpt-view,dashicons-exit,dashicons-external,dashicons-facebook-alt,dashicons-facebook,dashicons-feedback,dashicons-filter,dashicons-flag,dashicons-food,dashicons-format-aside,dashicons-format-audio,dashicons-format-chat,dashicons-format-gallery,dashicons-format-image,dashicons-format-quote,dashicons-format-status,dashicons-format-video,dashicons-forms,dashicons-fullscreen-alt,dashicons-fullscreen-exit-alt,dashicons-games,dashicons-google,dashicons-googleplus,dashicons-grid-view,dashicons-groups,dashicons-hammer,dashicons-heading,dashicons-heart,dashicons-hidden,dashicons-hourglass,dashicons-html,dashicons-id-alt,dashicons-id,dashicons-image-crop,dashicons-image-filter,dashicons-image-flip-horizontal,dashicons-image-flip-vertical,dashicons-image-rotate-left,dashicons-image-rotate-right,dashicons-image-rotate,dashicons-images-alt,dashicons-images-alt2,dashicons-index-card,dashicons-info-outline,dashicons-info,dashicons-insert-after,dashicons-insert-before,dashicons-insert,dashicons-instagram,dashicons-laptop,dashicons-layout,dashicons-leftright,dashicons-lightbulb,dashicons-linkedin,dashicons-list-view,dashicons-location-alt,dashicons-location,dashicons-lock-duplicate,dashicons-lock,dashicons-marker,dashicons-media-archive,dashicons-media-audio,dashicons-media-code,dashicons-media-default,dashicons-media-document,dashicons-media-interactive,dashicons-media-spreadsheet,dashicons-media-text,dashicons-media-video,dashicons-megaphone,dashicons-menu-alt,dashicons-menu-alt2,dashicons-menu-alt3,dashicons-menu,dashicons-microphone,dashicons-migrate,dashicons-minus,dashicons-money-alt,dashicons-money,dashicons-move,dashicons-nametag,dashicons-networking,dashicons-no-alt,dashicons-no,dashicons-open-folder,dashicons-palmtree,dashicons-paperclip,dashicons-pdf,dashicons-performance,dashicons-pets,dashicons-phone,dashicons-pinterest,dashicons-playlist-audio,dashicons-playlist-video,dashicons-plugins-checked,dashicons-plus-alt,dashicons-plus-alt2,dashicons-plus,dashicons-podio,dashicons-portfolio,dashicons-post-status,dashicons-pressthis,dashicons-printer,dashicons-privacy,dashicons-products,dashicons-randomize,dashicons-reddit,dashicons-redo,dashicons-remove,dashicons-rest-api,dashicons-rss,dashicons-saved,dashicons-schedule,dashicons-screenoptions,dashicons-search,dashicons-share-alt,dashicons-share-alt2,dashicons-share,dashicons-shield-alt,dashicons-shield,dashicons-shortcode,dashicons-slides,dashicons-smartphone,dashicons-smiley,dashicons-sort,dashicons-sos,dashicons-spotify,dashicons-star-empty,dashicons-star-filled,dashicons-star-half,dashicons-sticky,dashicons-store,dashicons-superhero-alt,dashicons-superhero,dashicons-table-col-after,dashicons-table-col-before,dashicons-table-col-delete,dashicons-table-row-after,dashicons-table-row-before,dashicons-table-row-delete,dashicons-tablet,dashicons-tag,dashicons-tagcloud,dashicons-testimonial,dashicons-text-page,dashicons-text,dashicons-thumbs-down,dashicons-thumbs-up,dashicons-tickets-alt,dashicons-tickets,dashicons-tide,dashicons-translation,dashicons-trash,dashicons-twitch,dashicons-twitter-alt,dashicons-twitter,dashicons-undo,dashicons-universal-access-alt,dashicons-universal-access,dashicons-unlock,dashicons-update-alt,dashicons-update,dashicons-upload,dashicons-vault,dashicons-video-alt,dashicons-video-alt2,dashicons-video-alt3,dashicons-visibility,dashicons-warning,dashicons-welcome-add-page,dashicons-welcome-comments,dashicons-welcome-learn-more,dashicons-welcome-view-site,dashicons-welcome-widgets-menus,dashicons-welcome-write-blog,dashicons-whatsapp,dashicons-wordpress-alt,dashicons-wordpress,dashicons-xing,dashicons-yes-alt,dashicons-yes,dashicons-youtube,dashicons-editor-distractionfree,dashicons-exerpt-view,dashicons-format-links,dashicons-format-standard,dashicons-post-trash,dashicons-share1,dashicons-welcome-edit-page,dashicons-arrow-down"; // Your entire string

function Edit({
  attributes,
  setAttributes
}) {
  const {
    timelineItems
  } = attributes;
  const dashiconArray = dashiconString.split(',');
  const [isOpen, setIsOpen] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(false);
  const [currentIndex, setcurrentIndex] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(0);
  const [topPosition, settopPosition] = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(0);
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    ...(0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.useBlockProps)()
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "timeline_aria"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "timeline_items"
  }, timelineItems.map((item, index) => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "timeline_item_area animate__animated",
    key: index
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    className: "dashicons  dashicons-trash remove-timeline-item",
    title: "remote timeline item",
    onClick: () => removeTimelineIte(index)
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "timeline_icon"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    className: `dashicons  ${item.timelineIcon}`,
    onClick: event => iconpickerClick(index, event)
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "timeline_date"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.RichText, {
    value: item.formattedDate,
    onChange: e => handleAttributeChange(index, 'formattedDate', e),
    placeholder: "Enter Date"
  }))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "timeline_item"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "timeline_thumbnail"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.MediaUpload, {
    onSelect: media => handleAttributeChange(index, 'postThumbnail', media.url),
    type: "image",
    value: item.postThumbnail,
    render: ({
      open
    }) => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
      src: item.postThumbnail,
      alt: "Thumbnail",
      onClick: open,
      style: {
        cursor: 'pointer'
      }
    })
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "timeline_title"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.RichText, {
    value: item.postTitle,
    onChange: value => handleAttributeChange(index, 'postTitle', value),
    placeholder: "Enter Title"
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "timeline_content"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.RichText, {
    value: item.postContent,
    onChange: value => handleAttributeChange(index, 'postContent', value),
    placeholder: "Enter Content"
  }))))))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "text-center clearfix"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    type: "button",
    className: "addtimeline-btn",
    onClick: addTimelineItem
  }, "Add Timeline Item")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: `dashicon-picker-aria ${isOpen == true ? 'opend' : ''}`,
    "data-top-position": topPosition
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "icon-picker-close"
  }, "   ", (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    className: "dashicons  dashicons-no-alt",
    onClick: () => setIsOpen(false)
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "icon-picker"
  }, dashiconArray.map(item => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    className: `dashicons ${item}`,
    "data-value": item,
    key: item,
    onClick: () => handleDashiconClick(item)
  })))));
  function handleDashiconClick(item) {
    setIsOpen(false);
    handleAttributeChange(currentIndex, 'timelineIcon', item);
    console.log(item);
  }
  function removeTimelineIte(itemIndex) {
    const newTimelineItems = [...timelineItems];
    newTimelineItems.splice(itemIndex, 1); // Removes one item at the specified index
    setAttributes({
      timelineItems: newTimelineItems
    });
  }
  // Function to handle attribute change for a specific timeline item
  function handleAttributeChange(itemIndex, attributeName, value) {
    // console.log(value);
    const newTimelineItems = [...timelineItems];
    newTimelineItems[itemIndex] = {
      ...newTimelineItems[itemIndex],
      [attributeName]: value
    };
    setAttributes({
      timelineItems: newTimelineItems
    });
  }
  function iconpickerClick(index, event) {
    setIsOpen(true);
    setcurrentIndex(index);
    settopPosition(event.clientY);
    console.log(event);
  }
  // Function to add a new timeline item
  function addTimelineItem() {
    setAttributes({
      timelineItems: [...timelineItems, {
        ...timelineItemDefault
      }]
    });
  }
}

/***/ }),

/***/ "./src/save.js":
/*!*********************!*\
  !*** ./src/save.js ***!
  \*********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ save)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */


/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @return {Element} Element to render.
 */
function save({
  attributes
}) {
  const {
    timelineItems
  } = attributes;
  const blockProps = _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.useBlockProps.save();
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "timeline_aria",
    ...blockProps
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "timeline_items"
  }, timelineItems.map((item, index) => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "timeline_item_area",
    key: index
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "timeline_icon"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    className: `dashicons ${item.timelineIcon}`
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "timeline_date"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", null, item.formattedDate)), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "timeline_item"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "timeline_thumbnail"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
    src: item.postThumbnail,
    alt: "Timeline Thumbnail"
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "timeline_title"
  }, item.postTitle), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "timeline_content"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, item.postContent)))))));
}

/***/ }),

/***/ "./src/editor.css":
/*!************************!*\
  !*** ./src/editor.css ***!
  \************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/index.css":
/*!***********************!*\
  !*** ./src/index.css ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/***/ ((module) => {

module.exports = window["React"];

/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/***/ ((module) => {

module.exports = window["wp"]["blockEditor"];

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/***/ ((module) => {

module.exports = window["wp"]["blocks"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ ((module) => {

module.exports = window["wp"]["i18n"];

/***/ }),

/***/ "./src/block.json":
/*!************************!*\
  !*** ./src/block.json ***!
  \************************/
/***/ ((module) => {

module.exports = JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":3,"name":"alchemy-software-limited/timeline","version":"0.1.0","title":"Timeline block","category":"widgets","icon":"dashicons dashicons-randomize","description":"Create timeline with this block; this is the part of timeline plugin developed by Alchemy Software Limited","example":{},"supports":{"html":false},"textdomain":"timeline","editorScript":"file:./index.js","editorStyle":["file:./index.css","file:./editor.css"],"style":"file:./index.css","viewScript":"file:./view.js"}');

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _index_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./index.css */ "./src/index.css");
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./edit */ "./src/edit.js");
/* harmony import */ var _save__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./save */ "./src/save.js");
/* harmony import */ var _block_json__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./block.json */ "./src/block.json");
/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */


/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */


/**
 * Internal dependencies
 */




/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
const attributes = {
  timelineItems: {
    type: 'array',
    default: []
  }
};
(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__.registerBlockType)(_block_json__WEBPACK_IMPORTED_MODULE_4__.name, {
  attributes,
  "supports": {
    "color": {
      //text: true,
      background: true
      //link: true,
    },
    //align: true,
    //anchor: true,

    customClassName: true
  },
  /**
   * @see ./edit.js
   */
  edit: _edit__WEBPACK_IMPORTED_MODULE_2__["default"],
  /**
   * @see ./save.js
   */
  save: _save__WEBPACK_IMPORTED_MODULE_3__["default"]
});
})();

/******/ })()
;
//# sourceMappingURL=index.js.map