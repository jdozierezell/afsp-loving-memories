<?php

return [

	'view-memory'=>'/view-memory#{:access_token}',
	'edit-memory'=>'/app/edit-memory#{:access_token}',
	'admin-preview-memory'=>'/view-memory?admin=1#{:access_token}',
	'preview-memory'=>'/app/preview-memory#{:access_token}',
	'invite-friend-memory'=>'/add-friend-memory?token={:access_token}',
	'review-friend-memory'=>'/review-friend-memory?token={:access_token}',
	'review-friend-memory-pending-admin'=>'/review-friend-memory-admin?token={:access_token}',
	'reset-password'=>'/reset-password',
	'start-memory'=>'?add=1',
	'verify-account'=>'/verify-account',
];
