import General from './_general';
import initFloorplan from './modules/_floorplan';

const App = {
  init() {
    new General();
    initFloorplan();
  },
};

document.addEventListener('DOMContentLoaded', () => {
  App.init();
});
