/* Page Specific JS */

F1.deferred.push(function initPage() {

	const elBlocks = document.getElementById( 'blocks' );
	const elContent = document.getElementById( 'content' );
	
	dragula( [ elBlocks, elContent ] );

});