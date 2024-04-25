/* global wp, jQuery */
/**
 * File customizer-controls.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer controls.
 */


wp.customize.bind('ready', () => {
    const orderSetting = wp.customize('mod_data_homepage_section_sortable');
    const panel = wp.customize.panel('homepage_option_panel');

    panel.contentContainer.sortable({
        item: '.control-section',
        cursor: 'move',
        placeholder: 'sortable-placeholder', //highlight
        opacity: 0.7,
        axis: 'y',
        stop: () => {
            // Get the sections in the new order.
            const newlySortedSections = [...panel.sections()].sort((a, b) => {
                return a.container.index() - b.container.index();
            });

            // Persist the new order as part of the changeset (and trigger preview update).
            orderSetting.set(
                newlySortedSections.map((section) => section.id).join(',')
            );
        }
    });

    // When the order setting is updated, make sure the sections get the appropriate priorities.
    // By setting the priorities in this way, the setting can be updated programmatically and the UI will
    // update accordingly. This two-way data binding.
    orderSetting.bind((newOrder) => {
        const newlyOrderedSections = newOrder.split(/,/).map((sectionId) => wp.customize.section(sectionId));
        newlyOrderedSections.forEach((section, i) => {
            section.priority(i);
        });
    });
});

