<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Admin
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property int $is_super
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin query()
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereIsSuper($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Admin whereUpdatedAt($value)
 */
	class Admin extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\HelpfulResource
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|HelpfulResource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HelpfulResource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HelpfulResource query()
 * @method static \Illuminate\Database\Eloquent\Builder|HelpfulResource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelpfulResource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelpfulResource whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelpfulResource whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelpfulResource whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelpfulResource whereUrl($value)
 */
	class HelpfulResource extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Memory
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string|null $loving
 * @property string|null $cover_image
 * @property string|null $thumbnail
 * @property string|null $description
 * @property string $theme_color
 * @property string $visible_type
 * @property string $access_token
 * @property int $reminder
 * @property int $status_id
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MemoryFavorites[] $favorites
 * @property-read int|null $favorites_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MemoryFriends[] $friends
 * @property-read int|null $friends_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MemoryPhotos[] $photos
 * @property-read int|null $photos_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MemoryVisibility[] $sharedVisibility
 * @property-read int|null $shared_visibility_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MemorySpecialDates[] $specialDates
 * @property-read int|null $special_dates_count
 * @property-read \App\Models\MemoryStatus $status
 * @property-read \App\Models\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MemoryFriends[] $verifiedFriends
 * @property-read int|null $verified_friends_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MemoryVideos[] $videos
 * @property-read int|null $videos_count
 * @method static \Database\Factories\MemoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Memory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Memory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Memory query()
 * @method static \Illuminate\Database\Eloquent\Builder|Memory whereAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Memory whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Memory whereCoverImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Memory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Memory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Memory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Memory whereLoving($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Memory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Memory whereReminder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Memory whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Memory whereThemeColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Memory whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Memory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Memory whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Memory whereVisibleType($value)
 */
	class Memory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MemoryAdminPreview
 *
 * @property int $memory_id
 * @property string $access_token
 * @property string $expire_at
 * @property-read \App\Models\Memory $memory
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryAdminPreview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryAdminPreview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryAdminPreview query()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryAdminPreview whereAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryAdminPreview whereExpireAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryAdminPreview whereMemoryId($value)
 */
	class MemoryAdminPreview extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MemoryFavorites
 *
 * @property int $id
 * @property string $name
 * @property string|null $image
 * @property int $memory_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Memory $memory
 * @method static \Database\Factories\MemoryFavoritesFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryFavorites newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryFavorites newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryFavorites query()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryFavorites whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryFavorites whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryFavorites whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryFavorites whereMemoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryFavorites whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryFavorites whereUpdatedAt($value)
 */
	class MemoryFavorites extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MemoryFriends
 *
 * @property int $id
 * @property string $email
 * @property string|null $description
 * @property int $verified 0-not verified , 1 -verified by owner 2 - verified by admin
 * @property string $access_token
 * @property string|null $relationship
 * @property string|null $image
 * @property int $memory_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $name
 * @property-read \App\Models\Memory $memory
 * @method static \Database\Factories\MemoryFriendsFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryFriends newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryFriends newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryFriends query()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryFriends whereAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryFriends whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryFriends whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryFriends whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryFriends whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryFriends whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryFriends whereMemoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryFriends whereRelationship($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryFriends whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryFriends whereVerified($value)
 */
	class MemoryFriends extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MemoryNotificationTypes
 *
 * @property int $id
 * @property string $type
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryNotificationTypes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryNotificationTypes newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryNotificationTypes query()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryNotificationTypes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryNotificationTypes whereType($value)
 */
	class MemoryNotificationTypes extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MemoryNotifications
 *
 * @property int $id
 * @property int $memory_id
 * @property int $user_to_notify
 * @property int $type_id
 * @property int $user_who_fired_event
 * @property int|null $friend_memory_id
 * @property string|null $data
 * @property int $read
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Memory $memory
 * @method static \Database\Factories\MemoryNotificationsFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryNotifications newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryNotifications newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryNotifications query()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryNotifications whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryNotifications whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryNotifications whereFriendMemoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryNotifications whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryNotifications whereMemoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryNotifications whereRead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryNotifications whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryNotifications whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryNotifications whereUserToNotify($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryNotifications whereUserWhoFiredEvent($value)
 */
	class MemoryNotifications extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MemoryPhotos
 *
 * @property int $id
 * @property string $image
 * @property int $memory_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Memory $memory
 * @method static \Database\Factories\MemoryPhotosFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryPhotos newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryPhotos newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryPhotos query()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryPhotos whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryPhotos whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryPhotos whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryPhotos whereMemoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryPhotos whereUpdatedAt($value)
 */
	class MemoryPhotos extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MemorySpecialDates
 *
 * @property int $id
 * @property string $date
 * @property string $name
 * @property int $memory_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Memory $memory
 * @method static \Database\Factories\MemorySpecialDatesFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|MemorySpecialDates newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemorySpecialDates newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemorySpecialDates query()
 * @method static \Illuminate\Database\Eloquent\Builder|MemorySpecialDates whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemorySpecialDates whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemorySpecialDates whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemorySpecialDates whereMemoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemorySpecialDates whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemorySpecialDates whereUpdatedAt($value)
 */
	class MemorySpecialDates extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MemoryStatus
 *
 * @property int $id
 * @property string $name
 * @property-read mixed $status_color
 * @property-read \App\Models\Memory $memory
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryStatus whereName($value)
 */
	class MemoryStatus extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MemoryVideos
 *
 * @property int $id
 * @property string $video
 * @property string|null $vimeo_id
 * @property int $memory_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Memory $memory
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryVideos newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryVideos newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryVideos query()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryVideos whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryVideos whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryVideos whereMemoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryVideos whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryVideos whereVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryVideos whereVimeoId($value)
 */
	class MemoryVideos extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MemoryVisibility
 *
 * @property int $id
 * @property string $email
 * @property int $memory_id
 * @property string $access_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Memory $memory
 * @method static \Database\Factories\MemoryVisibilityFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryVisibility newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryVisibility newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryVisibility query()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryVisibility whereAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryVisibility whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryVisibility whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryVisibility whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryVisibility whereMemoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoryVisibility whereUpdatedAt($value)
 */
	class MemoryVisibility extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $provider
 * @property string|null $provider_id
 * @property int $all_memory_reminder
 * @property int $receive_afsp_resources
 * @property int $notification_count
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAllMemoryReminder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNotificationCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereReceiveAfspResources($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

