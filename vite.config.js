import { resolve } from 'path'
import kirby from 'vite-plugin-kirby'

export default ({ mode }) => ({
  root: 'src',
  base: mode === 'development' ? '/' : '/dist/',

  build: {
    outDir: resolve(process.cwd(), 'public/dist'),
    emptyOutDir: true,
    rollupOptions: {
      input: ['index.js', 'homepageImages.js', 'index.css']
    }
  },

  plugins: [kirby()]
})