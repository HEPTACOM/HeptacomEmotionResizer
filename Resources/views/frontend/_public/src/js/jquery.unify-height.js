;(function ($, StateManager) {
    'use strict';

    StateManager.addPlugin('*[data-heptacom-emotion-resizer-unify-height="true"] .emotion--row', 'swPanelAutoResizer', {
        panelBodySelector: '.heptacom_emotion_resizer_unify_height'
    });

    $.subscribe('plugin/swEmotionLoader/onLoadEmotionFinished', function () {
        StateManager.updatePlugin('*[data-heptacom-emotion-resizer-unify-height="true"] .emotion--row', 'swPanelAutoResizer');
    });

    StateManager.on('resize', function () {
        StateManager.updatePlugin('*[data-heptacom-emotion-resizer-unify-height="true"] .emotion--row', 'swPanelAutoResizer');
    });

})(jQuery, window.StateManager);
