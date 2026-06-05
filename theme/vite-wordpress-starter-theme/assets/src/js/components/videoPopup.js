export function initVideoPopup() {
  const trigger = document.getElementById('video_popup');
  const modal = document.getElementById('modal-video');
  if (!trigger || !modal) return;

  const inner = modal.querySelector('.modal-video__inner');
  const close = modal.querySelector('.modal-video__close');

  function buildEmbed(url) {
    const ytMatch = url.match(/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^&?/]+)/);
    if (ytMatch) {
      return `<iframe src="https://www.youtube.com/embed/${ytMatch[1]}?autoplay=1&rel=0" frameborder="0" allowfullscreen allow="autoplay; encrypted-media"></iframe>`;
    }

    const vimeoMatch = url.match(/vimeo\.com\/(\d+)/);
    if (vimeoMatch) {
      return `<iframe src="https://player.vimeo.com/video/${vimeoMatch[1]}?autoplay=1" frameborder="0" allowfullscreen allow="autoplay"></iframe>`;
    }

    return `<video src="${url}" autoplay controls playsinline></video>`;
  }

  function openModal() {
    const url = trigger.dataset.videoUrl;
    if (!url) return;
    inner.innerHTML = buildEmbed(url);
    modal.classList.add('is-open');
    document.body.classList.add('modal-open');
  }

  function closeModal() {
    modal.classList.remove('is-open');
    document.body.classList.remove('modal-open');
    inner.innerHTML = '';
  }

  trigger.addEventListener('click', openModal);
  close.addEventListener('click', closeModal);

  modal.addEventListener('click', (e) => {
    if (e.target === modal) closeModal();
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal.classList.contains('is-open')) closeModal();
  });
}
