import { defineScreenshotScenario } from '@verbb/craft-screenshots/api';
import { createCpFullScreenPreset } from '@verbb/craft-screenshots/presets';

const preset = createCpFullScreenPreset();

export default defineScreenshotScenario({
    id: 'color-mixer-feature-tour-overview',
    output: 'feature-tour/overview.png',
    route: '/admin/settings/plugins/color-mixer',
    viewport: preset.viewport,
    waitFor: [
        { type: 'loadState', state: 'networkidle' },
        { type: 'selector', selector: '#main-content', state: 'visible' },
    ],
    steps: preset.steps,
    target: preset.target,
    caption: 'Color Mixer primary control-panel workflow.',
    intent: 'Canonical product overview for documentation, the Features page, and Plugin Store artwork. Add deterministic product fixtures and refine the crop before the first capture.',
});
