const puppeteer = require('puppeteer');

(async () => {
  const browser = await puppeteer.launch({ headless: true });
  const page = await browser.newPage();
  
  page.on('console', msg => console.log('PAGE LOG:', msg.text()));
  page.on('pageerror', err => console.log('PAGE ERROR:', err.toString()));
  
  await page.goto('http://localhost:3000');
  await page.waitForSelector('.add-to-cart-btn');
  console.log('Adding to cart...');
  await page.click('.add-to-cart-btn');
  
  await page.goto('http://localhost:3000/cart');
  await page.waitForSelector('#cart-items-body');
  
  const html = await page.evaluate(() => document.getElementById('cart-items-body').innerHTML);
  console.log('Cart HTML:');
  console.log(html);
  
  await browser.close();
})();
