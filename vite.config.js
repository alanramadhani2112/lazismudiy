import { defineConfig } from 'vite'

export default defineConfig({
  build: {
    outDir: 'wp-content/themes/lazismu-diy/assets/dist',
    emptyOutDir: true,
    manifest: false,
    rollupOptions: {
      input: 'wp-content/themes/lazismu-diy/assets/src/js/app.js',
      output: {
        entryFileNames: 'app.js',
        assetFileNames: 'app.[ext]'
      }
    }
  }
})
