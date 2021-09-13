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

## FAQ

1. Requires PHP extension ext-gd * but it is missing from your system. Install or enable PHP's GD extension.
   - On Windows<br />
      a. Open `php.ini` using text editor or notepad<br />
      b. Go to `Dynamic Extensions`<br />
      c. Find `;extension=gd` or `;extension=gd2`<br />
      d. Remove the semicolon (`;`)<br />
      e. Save file
      
   - On Linux (Note: Change x.x to version number, eg. php7.4-gd)
     ```bash
     sudo apt-get install phpx.x-gd
     ```
     
2. Requires PHP extension ext-gmp * but it is missing from your system. Install or enable PHP's GMP extension.
   - On Windows<br />
      a. Open `php.ini`<br />
      b. Go to `Dynamic Extensions`<br />
      c. Find `;extension=gmp`<br />
      d. Remove the semicolon (`;`)<br />
      e. Save file
      
   - On Linux (Note: Change x.x to PHP version, eg. php7.4-gmp)
     ```bash
     sudo apt-get install phpx.x-gmp
     ```

## License

Code licensed under [Apache 2.0 License](./LICENSE).
