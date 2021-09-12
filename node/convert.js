// include dependencies
const fs = require("fs");
const path = require("path");
const PDFDocument = require("pdfkit");

// resolve directory path "certificate"
const resultDir = path.resolve(
	__dirname,
	"..",
	"result",
	"certificate"
);

// read folder in directory
fs.readdirSync(resultDir).forEach((file) => {
	// ignore .gitkeep, .gitignore or data.json file
	if (
		file == ".gitkeep" ||
		file == ".gitignore" ||
		file == "data.json"
	) {
		return;
	}

	file = path.join(resultDir, file);
	// instantiate pdfkit class
	let document = new PDFDocument({
		autoFirstPage: false
	});

	// open an image
	let image = document.openImage(file);
	// add it to a new page
	document.addPage({
		size: [image.width, image.height]
	}).image(file, 0, 0);

	// end document
	document.end();

	// resolve file result directory path
	let result = path.parse(file).name + ".pdf";
	result = path.join(resultDir, result);

	// write pdf result to file
	document.pipe(fs.createWriteStream(result))
		.on("finish", () => {
			// cli message
			console.log("Successfully convert " + path.basename(file) + " file to PDF.");

			// unlink/delete original file
			fs.unlinkSync(file);
		})
		.on("error", console.error);
});