<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PNG Minimizer (Local)</title>
  <style>
    :root {
      color-scheme: light dark;
      --bg: #111827;
      --card: #1f2937;
      --line: #374151;
      --text: #f9fafb;
      --muted: #9ca3af;
      --accent: #22c55e;
      --accent-2: #3b82f6;
      --danger: #ef4444;
    }

    * { box-sizing: border-box; }
    body {
      margin: 0;
      font-family: Inter, ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
      background: radial-gradient(circle at top left, #1f2937, #111827);
      color: var(--text);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding: 2rem 1rem;
    }

    .app {
      width: min(980px, 100%);
      background: color-mix(in srgb, var(--card), transparent 8%);
      border: 1px solid var(--line);
      border-radius: 16px;
      padding: 1rem;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }

    h1 {
      margin: 0 0 0.5rem;
      font-size: clamp(1.3rem, 2vw, 1.8rem);
    }

    p, li {
      color: var(--muted);
      line-height: 1.5;
    }

    .drop-zone {
      margin-top: 1rem;
      border: 2px dashed var(--accent-2);
      border-radius: 14px;
      min-height: 180px;
      display: grid;
      place-items: center;
      text-align: center;
      padding: 1rem;
      background: rgba(59, 130, 246, 0.08);
      transition: 0.2s ease;
    }

    .drop-zone.dragover {
      border-color: var(--accent);
      background: rgba(34, 197, 94, 0.12);
      transform: scale(1.01);
    }

    .controls {
      margin-top: 0.8rem;
      display: flex;
      gap: 0.5rem;
      flex-wrap: wrap;
    }

    button {
      border: 1px solid var(--line);
      background: #111827;
      color: var(--text);
      border-radius: 10px;
      padding: 0.55rem 0.85rem;
      cursor: pointer;
      font-weight: 600;
    }

    button.primary { border-color: var(--accent-2); }
    button.success { border-color: var(--accent); }
    button:disabled { opacity: 0.5; cursor: not-allowed; }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1rem;
      font-size: 0.92rem;
    }

    th, td {
      border-bottom: 1px solid var(--line);
      padding: 0.5rem;
      text-align: left;
      vertical-align: top;
    }

    .status-ok { color: var(--accent); }
    .status-warn { color: #f59e0b; }
    .status-err { color: var(--danger); }

    code { color: #93c5fd; }
  </style>
</head>
<body>
  <main class="app">
    <h1>Local PNG Minimizer</h1>
    <p>
      Drag & drop multiple PNG files. Each file is processed in your browser only (no upload).
      The tool starts at <strong>50% width/height</strong>, then adjusts scale to target
      <strong>500–1000 KB</strong> when possible.
    </p>

    <div id="dropZone" class="drop-zone" role="button" tabindex="0" aria-label="Drop PNG files here">
      <div>
        <strong>Drop PNG files here</strong><br />
        or use <code>Choose files</code>
      </div>
    </div>

    <div class="controls">
      <input id="fileInput" type="file" accept="image/png" multiple hidden />
      <button id="pickBtn" class="primary" type="button">Choose files</button>
      <button id="downloadAllBtn" class="success" type="button" disabled>Download all</button>
      <button id="clearBtn" type="button">Clear list</button>
    </div>

    <table>
      <thead>
        <tr>
          <th>File</th>
          <th>Original</th>
          <th>Output</th>
          <th>Scale</th>
          <th>Status</th>
          <th>Download</th>
        </tr>
      </thead>
      <tbody id="resultsBody"></tbody>
    </table>
  </main>

  <script>
    const MIN_KB = 500;
    const MAX_KB = 1000;
    const START_SCALE = 0.5;

    const dropZone = document.getElementById('dropZone');
    const fileInput = document.getElementById('fileInput');
    const pickBtn = document.getElementById('pickBtn');
    const downloadAllBtn = document.getElementById('downloadAllBtn');
    const clearBtn = document.getElementById('clearBtn');
    const resultsBody = document.getElementById('resultsBody');

    const outputFiles = [];

    const kb = bytes => (bytes / 1024).toFixed(1);

    function isPng(file) {
      return file.type === 'image/png' || file.name.toLowerCase().endsWith('.png');
    }

    function readImage(file) {
      return new Promise((resolve, reject) => {
        const img = new Image();
        const url = URL.createObjectURL(file);
        img.onload = () => {
          URL.revokeObjectURL(url);
          resolve(img);
        };
        img.onerror = () => reject(new Error('Could not decode image'));
        img.src = url;
      });
    }

    function canvasToBlob(canvas) {
      return new Promise((resolve, reject) => {
        canvas.toBlob(blob => {
          if (!blob) return reject(new Error('Canvas encoding failed'));
          resolve(blob);
        }, 'image/png');
      });
    }

    async function encodeAtScale(img, scale) {
      const canvas = document.createElement('canvas');
      canvas.width = Math.max(1, Math.round(img.width * scale));
      canvas.height = Math.max(1, Math.round(img.height * scale));
      const ctx = canvas.getContext('2d', { alpha: true });
      ctx.imageSmoothingEnabled = true;
      ctx.imageSmoothingQuality = 'high';
      ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
      const blob = await canvasToBlob(canvas);
      return { blob, scale, width: canvas.width, height: canvas.height };
    }

    async function optimizePng(file) {
      const img = await readImage(file);

      // Start from exactly 50% dimensions.
      let best = await encodeAtScale(img, START_SCALE);

      // If already within range, done.
      let sizeKb = best.blob.size / 1024;
      if (sizeKb >= MIN_KB && sizeKb <= MAX_KB) {
        return { result: best, status: 'In target range' };
      }

      // Search scale between 10% and 100%, preferring value close to 50% but inside range.
      let lo = 0.1;
      let hi = 1.0;
      let candidate = null;

      for (let i = 0; i < 10; i += 1) {
        const mid = (lo + hi) / 2;
        const attempt = await encodeAtScale(img, mid);
        const attemptKb = attempt.blob.size / 1024;

        if (attemptKb >= MIN_KB && attemptKb <= MAX_KB) {
          if (!candidate || Math.abs(attempt.scale - START_SCALE) < Math.abs(candidate.scale - START_SCALE)) {
            candidate = attempt;
          }
        }

        if (attemptKb > MAX_KB) {
          hi = mid;
        } else {
          lo = mid;
        }
      }

      if (candidate) {
        return { result: candidate, status: 'Adjusted to match target KB range' };
      }

      // Fall back to best effort: keep under max if possible, else 50% output.
      if (sizeKb > MAX_KB) {
        let scale = START_SCALE;
        let reduced = best;
        for (let i = 0; i < 8 && reduced.blob.size / 1024 > MAX_KB; i += 1) {
          scale *= 0.85;
          reduced = await encodeAtScale(img, scale);
        }
        return { result: reduced, status: (reduced.blob.size / 1024 <= MAX_KB) ? 'Reduced below max (best effort)' : 'Could not hit max (best effort)' };
      }

      return { result: best, status: 'Below 500 KB at 50% (best effort)' };
    }

    function addRow(file) {
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td>${file.name}</td>
        <td>${kb(file.size)} KB</td>
        <td>Processing…</td>
        <td>—</td>
        <td>—</td>
        <td>—</td>
      `;
      resultsBody.appendChild(tr);
      return tr;
    }

    function setRowResult(tr, file, output, status, error) {
      if (error) {
        tr.children[2].textContent = '—';
        tr.children[3].textContent = '—';
        tr.children[4].innerHTML = `<span class="status-err">${error}</span>`;
        tr.children[5].textContent = '—';
        return;
      }

      const outKb = output.blob.size / 1024;
      const inRange = outKb >= MIN_KB && outKb <= MAX_KB;
      const statusClass = inRange ? 'status-ok' : 'status-warn';

      tr.children[2].textContent = `${kb(output.blob.size)} KB (${output.width}×${output.height})`;
      tr.children[3].textContent = `${(output.scale * 100).toFixed(1)}%`;
      tr.children[4].innerHTML = `<span class="${statusClass}">${status}</span>`;

      const outName = file.name.replace(/\.png$/i, '') + '-min.png';
      const outFile = new File([output.blob], outName, { type: 'image/png' });
      const url = URL.createObjectURL(outFile);

      outputFiles.push({ file: outFile, url });
      const a = document.createElement('a');
      a.href = url;
      a.download = outName;
      a.textContent = 'Download';
      a.rel = 'noopener';
      tr.children[5].innerHTML = '';
      tr.children[5].appendChild(a);
      downloadAllBtn.disabled = outputFiles.length === 0;
    }

    async function handleFiles(files) {
      const pngs = Array.from(files).filter(isPng);
      for (const file of pngs) {
        const row = addRow(file);
        try {
          const { result, status } = await optimizePng(file);
          setRowResult(row, file, result, status);
        } catch (err) {
          setRowResult(row, file, null, '', err.message || 'Processing failed');
        }
      }
    }

    function clearAll() {
      outputFiles.forEach(({ url }) => URL.revokeObjectURL(url));
      outputFiles.length = 0;
      resultsBody.innerHTML = '';
      downloadAllBtn.disabled = true;
    }

    ['dragenter', 'dragover'].forEach(evt => {
      dropZone.addEventListener(evt, e => {
        e.preventDefault();
        dropZone.classList.add('dragover');
      });
    });

    ['dragleave', 'drop'].forEach(evt => {
      dropZone.addEventListener(evt, e => {
        e.preventDefault();
        dropZone.classList.remove('dragover');
      });
    });

    dropZone.addEventListener('drop', e => handleFiles(e.dataTransfer.files));
    dropZone.addEventListener('click', () => fileInput.click());
    dropZone.addEventListener('keydown', e => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        fileInput.click();
      }
    });

    pickBtn.addEventListener('click', () => fileInput.click());
    fileInput.addEventListener('change', e => handleFiles(e.target.files));

    downloadAllBtn.addEventListener('click', () => {
      outputFiles.forEach(({ file, url }, i) => {
        setTimeout(() => {
          const a = document.createElement('a');
          a.href = url;
          a.download = file.name;
          a.click();
        }, i * 120);
      });
    });

    clearBtn.addEventListener('click', clearAll);
  </script>
</body>
</html>
