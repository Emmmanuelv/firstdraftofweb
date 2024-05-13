( function( api ) {

	// Extends our custom "rc-drone" section.
	api.sectionConstructor['rc-drone'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );