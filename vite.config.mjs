import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
  build: {
    assetsDir: '',
    emptyOutDir: true,
    manifest: true,
    outDir: `web/wp-content/themes/starter/dist`,
    rollupOptions: {
      main: 'web/wp-content/themes/starter/scripts/main.js',
    },
  },
  plugins: [
    {
      name: 'php',
      handleHotUpdate({ file, server }) {
        if (file.endsWith('.php')) {
          server.ws.send({ type: 'full-reload', path: '*' });
        }
      },
    },
    tailwindcss(),
  ],
});
