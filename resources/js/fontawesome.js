import fontawesome from '@fortawesome/fontawesome';
import { config, dom } from '@fortawesome/fontawesome-svg-core';
import {faCaretUp,
        faCaretDown,
        faStar,
        faCheck }from '@fortawesome/free-solid-svg-icons';

config.autoReplaceSvg = 'nest';
fontawesome.library.add(faCaretUp, faCaretDown, faCheck, faStar);
dom.watch();