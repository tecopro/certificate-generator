# Certificate Generator

Certificate generator for Technology Community Extracurricular at [SMK Negeri 1 Pemalang](https://github.com/smkn1pml).

## Requirements

- PHP >= 7.4
- Node.js >= 12.x
- Composer v2
- ImageMagick

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

## License

Code licensed under [Apache 2.0 License](./LICENSE).
