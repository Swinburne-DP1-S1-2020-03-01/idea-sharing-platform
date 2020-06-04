'use strict';

const VALIDATION_MODE = 'validationMode';

module.exports = function notifyValimate(isRunning) {
	const isValidating = process.argv.indexOf(VALIDATION_MODE) > -1;
	
	if (isValidating) {
		process.send(isRunning);
	}
}