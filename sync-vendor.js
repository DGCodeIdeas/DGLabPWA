const fs = require('fs');
const path = require('path');

const vendors = [
  {
    name: 'bootstrap',
    src: 'node_modules/bootstrap/dist',
    dest: 'assets/vendor/bootstrap'
  },
  {
    name: 'jquery',
    src: 'node_modules/jquery/dist',
    dest: 'assets/js/vendor',
    files: ['jquery.min.js', 'jquery.min.map']
  },
  {
    name: 'fontawesome',
    src: 'node_modules/@fortawesome/fontawesome-free',
    dest: 'assets/vendor/fontawesome',
    include: ['css', 'webfonts']
  }
];

function copyRecursiveSync(src, dest) {
  const exists = fs.existsSync(src);
  const stats = exists && fs.statSync(src);
  const isDirectory = exists && stats.isDirectory();
  if (isDirectory) {
    if (!fs.existsSync(dest)) {
      fs.mkdirSync(dest, { recursive: true });
    }
    fs.readdirSync(src).forEach(childItemName => {
      copyRecursiveSync(path.join(src, childItemName), path.join(dest, childItemName));
    });
  } else {
    fs.mkdirSync(path.dirname(dest), { recursive: true });
    fs.copyFileSync(src, dest);
  }
}

vendors.forEach(vendor => {
  const destPath = path.resolve(__dirname, vendor.dest);

  // Clean destination if it exists (optional, but good for freshness)
  // if (fs.existsSync(destPath)) {
  //   fs.rmSync(destPath, { recursive: true, force: true });
  // }

  if (vendor.files) {
    vendor.files.forEach(file => {
      const srcFile = path.join(vendor.src, file);
      const destFile = path.join(destPath, file);
      fs.mkdirSync(path.dirname(destFile), { recursive: true });
      fs.copyFileSync(srcFile, destFile);
      console.log(`Copied ${file} to ${vendor.dest}`);
    });
  } else if (vendor.include) {
    vendor.include.forEach(dir => {
      const srcDir = path.join(vendor.src, dir);
      const destDir = path.join(destPath, dir);
      copyRecursiveSync(srcDir, destDir);
      console.log(`Copied ${dir} to ${vendor.dest}`);
    });
  } else {
    copyRecursiveSync(vendor.src, destPath);
    console.log(`Copied ${vendor.name} to ${vendor.dest}`);
  }
});
