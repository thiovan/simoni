require("./bootstrap");

window.$ = window.jQuery = require('jquery');
window.Popper = require('popper.js');
require('bootstrap');

import Alpine from "alpinejs";
import Chart from "chart.js/auto";
import '@fortawesome/fontawesome-free/js/all';

window.Alpine = Alpine;
Alpine.start();

window.Chart = Chart;
