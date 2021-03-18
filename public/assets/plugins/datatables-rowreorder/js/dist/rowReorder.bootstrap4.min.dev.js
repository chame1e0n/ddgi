"use strict";

function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/*!
 Bootstrap 4 styling wrapper for RowReorder
 ©2018 SpryMedia Ltd - datatables.net/license
*/
(function (c) {
  "function" === typeof define && define.amd ? define(["jquery", "datatables.net-bs4", "datatables.net-rowreorder"], function (a) {
    return c(a, window, document);
  }) : "object" === (typeof exports === "undefined" ? "undefined" : _typeof(exports)) ? module.exports = function (a, b) {
    a || (a = window);
    if (!b || !b.fn.dataTable) b = require("datatables.net-bs4")(a, b).$;
    b.fn.dataTable.RowReorder || require("datatables.net-rowreorder")(a, b);
    return c(b, a, a.document);
  } : c(jQuery, window, document);
})(function (c) {
  return c.fn.dataTable;
});