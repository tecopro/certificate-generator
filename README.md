# Certificate Generator

Certificate generator for Technology Community Extracurricular at [SMK Negeri 1 Pemalang](https://github.com/smkn1pml).

## Requirements

- PHP >= 7.4
- Node.js >= 12.x
- Composer v2
- NPM

## Installation

1. Clone this repository
   ```bash
   git clone https://github.com/tecopro/certificate-generator.git
   ```

2. Change current directory to this repository folder
   ```bash
   cd certificate-generator
   ```

3. Install dependencies (PHP)
   ```bash
   composer update
   ```

4. Install dependencies (Node.js)
   ```bash
   npm update
   ```

5. Done~

## Usage

### Tired mode

Do it one-by-one, starting from generating and then converting the resulting image into a PDF file.

1. Generate first
   ```bash
   composer run generate
   ```

2. Convert it
   ```bash
   npm run convert
   ```

### Generate & Convert

Instead of wasting time to generate first and then convert, it's better to use the following command to generate and also convert directly.

```bash
npm run generate
```

## Troubleshooting

1. Requires PHP extension ext-gd * but it is missing from your system. Install or enable PHP's GD extension.
   
   - On Windows
     
     1. Open `php.ini` using text editor or notepad
     2. Go to **Dynamic Extensions**
     3. Find `;extension=gd` or `;extension=gd2`
     4. Remove the semicolon (`;`)
     5. Save file
     
   - On Linux
     
     ```bash
	 sudo apt install phpx.x-gd
	 # change x.x to php version number, eg. php7.4-gd
	 ```
     
2. Requires PHP extension ext-gmp * but it is missing from your system. Install or enable PHP's GMP extension.
   
   - On Windows
     
     1. Open `php.ini` using text editor or notepad
     2. Go to **Dynamic Extensions**
     3. Find `;extension=gmp`
     4. Remove the semicolon (`;`)
     5. Save file
     
   - On Linux
     
     ```bash
	 sudo apt install phpx.x-gmp
	 # change x.x to php version number, eg. php7.4-gmp
	 ```

## License

Code licensed under [Apache 2.0 License](./LICENSE).
