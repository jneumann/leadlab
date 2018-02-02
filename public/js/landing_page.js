/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 45);
/******/ })
/************************************************************************/
/******/ ({

/***/ 11:
/***/ (function(module, exports) {

function ready(fn) {
		if (document.attachEvent ? document.readyState === "complete" : document.readyState !== "loading") {
				fn();
		} else {
				document.addEventListener('DOMContentLoaded', fn);
		}
}

function val_by_class(el) {
		return document.getElementsByClassName(el)[0].value;
}

function calculate_principal() {
		var down_payment = val_by_class("down_payment");

		var i = parseFloat(val_by_class("interest_rate"));
		if (i >= 1.0) {
				i = i / 100.0;
		}
		i /= 12;
		var noMonths = 360,
		    pow = 1,
		    Vpayment = parseFloat(val_by_class("monthly_payment"));
		for (var j = 0; j < noMonths; j++) {
				pow = pow * (1 + i);
		}
		var Rprincipal = (pow - 1) * Vpayment / (pow * i);
		Rprincipal -= down_payment;

		Rprincipal = parseFloat(Rprincipal).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

		document.getElementsByClassName('total')[0].innerHTML = "$" + Rprincipal;
}

document.querySelectorAll(".calculator input").forEach(function (el) {
		el.addEventListener("change", function () {
				calculate_principal();
		});
});

ready(calculate_principal());

/***/ }),

/***/ 45:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(11);


/***/ })

/******/ });