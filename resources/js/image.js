// import Glide from '@glidejs/glide';
import Luminous, { LuminousGallery } from 'luminous-lightbox';

export default class Image {

    constructor() {
        this.luminous();
    }

    luminous() {
        new LuminousGallery(document.querySelectorAll('.left .luminous'));

    }


}
