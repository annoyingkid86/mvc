//import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';
import quote from './js/quote_json.js';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');

const quoteJson = await quote();

let quoteElement = document.getElementById('quote');

quoteElement.innerHTML = '<p>' + quoteJson['quote'] + '</p>';

let date = document.getElementById('date');

date.innerHTML = '<p>' + quoteJson['date'] + '</p>';
