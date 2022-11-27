( function( api ) {

	// Extends our custom "plumber-services" section.
	api.sectionConstructor['plumber-services'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );