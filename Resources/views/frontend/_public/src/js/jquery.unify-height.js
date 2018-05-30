;(function ($, StateManager) {
    'use strict';

    $.subscribe('plugin/swEmotionLoader/onLoadEmotionFinished', function () {
        StateManager.addPlugin('*[data-heptacom-emotion-resizer-unify-height="true"] .emotion--row', 'swPanelAutoResizer', {
            panelBodySelector: '.heptacom_emotion_resizer_unify_height'
        });
    });

})(jQuery, window.StateManager);
