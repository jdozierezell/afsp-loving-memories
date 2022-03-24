<?php

return [

	'view-memory'=>'app/view-memory#{:access_token}',
	'edit-memory'=>'app/edit-memory#{:access_token}',
	'admin-preview-memory'=>'/app/view-memory?admin=1#{:access_token}',
	'preview-memory'=>'/app/preview-memory#{:access_token}',
	'invite-friend-memory'=>'/app/add-friend-memory?token={:access_token}',
	'review-friend-memory'=>'/app/review-friend-memory?token={:access_token}',
	'review-friend-memory-pending-admin'=>'/app/review-friend-memory-admin?token={:access_token}',
	'reset-password'=>'/app/reset-password',
	'start-memory'=>'/app/add-memory',
	'verify-account'=>'/app/verify-account',
];
