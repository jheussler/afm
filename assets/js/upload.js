import '@uppy/core/dist/style.css'
import '@uppy/dashboard/dist/style.css'
import '@uppy/drag-drop/dist/style.css'

const Uppy = require('@uppy/core');
const DragDrop = require('@uppy/drag-drop');
const Dashboard = require('@uppy/dashboard');

const uppy = Uppy({
    debug: true,
    autoProceed: false
});


uppy.use(Dashboard, {
    inline: true,
    target: '.uppy-dragdrop',
    plugins: [],
    width: '100%',
    height: '400px'
});



