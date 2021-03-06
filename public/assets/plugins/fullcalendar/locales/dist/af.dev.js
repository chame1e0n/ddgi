"use strict";

function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

(function (global, factory) {
  (typeof exports === "undefined" ? "undefined" : _typeof(exports)) === 'object' && typeof module !== 'undefined' ? module.exports = factory() : typeof define === 'function' && define.amd ? define(factory) : (global = global || self, (global.FullCalendarLocales = global.FullCalendarLocales || {}, global.FullCalendarLocales.af = factory()));
})(void 0, function () {
  'use strict';

  var af = {
    code: "af",
    week: {
      dow: 1,
      doy: 4 // Die week wat die 4de Januarie bevat is die eerste week van die jaar.

    },
    buttonText: {
      prev: "Vorige",
      next: "Volgende",
      today: "Vandag",
      year: "Jaar",
      month: "Maand",
      week: "Week",
      day: "Dag",
      list: "Agenda"
    },
    allDayHtml: "Heeldag",
    eventLimitText: "Addisionele",
    noEventsMessage: "Daar is geen gebeurtenisse nie"
  };
  return af;
});