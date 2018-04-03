;(function ($, StateManager) {
    'use strict';

    $.subscribe('plugin/swEmotionLoader/onLoadEmotionFinished', function () {
        StateManager.addPlugin('*[data-ksk-emotion-resizer-unify-height="true"] .emotion--row', 'swPanelAutoResizer', {
            panelBodySelector: '.ksk_emotion_resizer_unify_height'
        });
    });

})(jQuery, window.StateManager);
