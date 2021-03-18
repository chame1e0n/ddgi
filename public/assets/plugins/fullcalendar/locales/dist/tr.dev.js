"use strict";

function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

(function (global, factory) {
  (typeof exports === "undefined" ? "undefined" : _typeof(exports)) === 'object' && typeof module !== 'undefined' ? module.exports = factory() : typeof define === 'function' && define.amd ? define(factory) : (global = global || self, (global.FullCalendarLocales = global.FullCalendarLocales || {}, global.FullCalendarLocales.tr = factory()));
})(void 0, function () {
  'use strict';

  var tr = {
    code: "tr",
    week: {
      dow: 1,
      doy: 7 // The week that contains Jan 1st is the first week of the year.

    },
    buttonText: {
      prev: "geri",
      next: "ileri",
      today: "bugün",
      month: "Ay",
      week: "Hafta",
      day: "Gün",
      list: "Ajanda"
    },
    weekLabel: "Hf",
    allDayText: "Tüm gün",
    eventLimitText: "daha fazla",
    noEventsMessage: "Gösterilecek etkinlik yok"
  };
  return tr;
});