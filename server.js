const http = require('http');
const fs = require('fs');
const path = require('path');

const PORT = 3000;

const MIME_TYPES = {
    '.html': 'text/html',
    '.php': 'text/html',
    '.css': 'text/css',
    '.js': 'application/javascript',
    '.png': 'image/png',
    '.jpg': 'image/jpeg',
    '.jpeg': 'image/jpeg',
    '.woff': 'font/woff',
    '.woff2': 'font/woff2',
    '.ttf': 'font/ttf',
    '.eot': 'application/vnd.ms-fontobject',
    '.svg': 'image/svg+xml'
};

// Mock products to replace PHP logic
const mockProducts = [
    { Name: 'Gaming Laptop', Price: '1200', ImageUrl: 'c-1.png' },
    { Name: 'Drone Pro', Price: '800', ImageUrl: 'c-2.png' },
    { Name: 'VR Headset', Price: '400', ImageUrl: 'c-3.png' },
    { Name: 'Smartphone', Price: '900', ImageUrl: 'c-4.png' }
];

const generateMockProductsHTML = () => {
    return mockProducts.map(p => `
        <div class="col-md-3 col-sm-6 business_content">
            <img src="img/${p.ImageUrl}" alt="" style="width: 100%; max-width: 250px;">
            <div class="media">
                <div class="media-left"></div>
                <div class="media-body">
                    <a href="#">${p.Name}</a>
                    <p>Purchase ${p.Name} at the lowest price <span>$${p.Price}</span></p>
                    <button class="btn btn-primary add-to-cart-btn" data-name="${p.Name}" data-price="${p.Price}" data-image="${p.ImageUrl}" style="margin-top: 10px;">Add to Cart</button>
                </div>
            </div>
        </div>
    `).join('');
};

http.createServer((req, res) => {
    console.log(`[${req.method}] ${req.url}`);
    
    // Routing logic matching vercel.json
    let filePath = '.' + req.url;
    
    if (req.url === '/') filePath = './api/index.php';
    else if (req.url === '/contact') filePath = './api/contact.php';
    else if (req.url === '/cart') filePath = './api/cart.php';
    else if (req.url.startsWith('/css/') || req.url.startsWith('/js/') || req.url.startsWith('/img/') || req.url.startsWith('/vendors/') || req.url.startsWith('/fonts/')) {
        filePath = '.' + req.url;
    } else {
        filePath = './api/index.php';
    }

    // Remove query strings
    filePath = filePath.split('?')[0];

    const extname = String(path.extname(filePath)).toLowerCase();
    const contentType = MIME_TYPES[extname] || 'application/octet-stream';

    const isText = ['.html', '.php', '.css', '.js'].includes(extname);

    if (isText) {
        fs.readFile(filePath, 'utf8', (err, content) => {
            if (err) {
                res.writeHead(404);
                res.end('File not found: ' + filePath);
                return;
            }

            // If it's the index.php, we need to mock the PHP execution
            if (filePath === './api/index.php') {
                const phpStart = content.indexOf('<?php');
                const phpEnd = content.lastIndexOf('?>') + 2;
                
                if (phpStart !== -1 && phpEnd !== -1) {
                    const beforePhp = content.substring(0, phpStart);
                    const afterPhp = content.substring(phpEnd);
                    content = beforePhp + generateMockProductsHTML() + afterPhp;
                }
            }

            res.writeHead(200, { 'Content-Type': contentType });
            res.end(content, 'utf-8');
        });
    } else {
        fs.readFile(filePath, (err, rawContent) => {
            if (err) {
                res.writeHead(404);
                res.end('File not found: ' + filePath);
            } else {
                res.writeHead(200, { 'Content-Type': contentType });
                res.end(rawContent, 'binary');
            }
        });
    }
}).listen(PORT, () => {
    console.log(`Local dev server running at http://localhost:${PORT}`);
    console.log('Open the URL in your browser to test the site locally!');
});
