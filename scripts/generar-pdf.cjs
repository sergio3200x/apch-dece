const fs = require('fs');
const puppeteer = require('puppeteer');

async function generarPDF() {
    const htmlPath = process.argv[2];
    const pdfPath = process.argv[3];

    if (!htmlPath || !pdfPath) {
        console.error('Uso: node generar-pdf.cjs archivo.html archivo.pdf');
        process.exit(1);
    }

    if (!fs.existsSync(htmlPath)) {
        console.error('No existe el archivo HTML:', htmlPath);
        process.exit(1);
    }

    const html = fs.readFileSync(htmlPath, 'utf8');

    const browser = await puppeteer.launch({
        headless: true,
        executablePath: '/usr/bin/google-chrome',
        args: [
            '--no-sandbox',
            '--disable-setuid-sandbox',
            '--disable-dev-shm-usage'
        ]
    });

    try {
        const page = await browser.newPage();

        await page.setContent(html, {
            waitUntil: 'networkidle0'
        });

        await page.emulateMediaType('print');

        await page.pdf({
            path: pdfPath,
            format: 'A4',
            printBackground: true,
            preferCSSPageSize: true,
            margin: {
                top: '0',
                right: '0',
                bottom: '0',
                left: '0'
            }
        });

        console.log('PDF generado correctamente:');
        console.log(pdfPath);

    } finally {
        await browser.close();

        /*
        |--------------------------------------------------------------------------
        | El HTML fue solamente temporal.
        |--------------------------------------------------------------------------
        */

        try {
            if (fs.existsSync(htmlPath)) {
                fs.unlinkSync(htmlPath);
                console.log('HTML temporal eliminado.');
            }
        } catch (error) {
            console.error('No se pudo eliminar el HTML temporal:', error.message);
        }
    }
}

generarPDF().catch(error => {
    console.error('Error generando PDF:');
    console.error(error);
    process.exit(1);
});
