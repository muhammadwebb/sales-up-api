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
 * App\Models\Bot
 *
 * @property int $id
 * @property int $company_id
 * @property string $token
 * @property string $chat_id
 * @property string $username
 * @property string $filename
 * @property string $contact
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company $company
 * @method static \Illuminate\Database\Eloquent\Builder|Bot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bot query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bot whereChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bot whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bot whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bot whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bot whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bot whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bot whereUsername($value)
 * @mixin \Eloquent
 */
	class IdeHelperBot {}
}

namespace App\Models{
/**
 * App\Models\Company
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $description
 * @property string $phone
 * @property int $is_current_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Bot> $bots
 * @property-read int|null $bots_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Course> $courses
 * @property-read int|null $courses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Lead> $leads
 * @property-read int|null $leads_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Marketing> $marketings
 * @property-read int|null $marketings_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Source> $sources
 * @property-read int|null $sources_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Status> $status
 * @property-read int|null $status_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereIsCurrentActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUserId($value)
 * @mixin \Eloquent
 */
	class IdeHelperCompany {}
}

namespace App\Models{
/**
 * App\Models\Course
 *
 * @property int $id
 * @property int $company_id
 * @property string $title
 * @property string $description
 * @property int $clicked
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company $company
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @method static \Illuminate\Database\Eloquent\Builder|Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course query()
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereClicked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperCourse {}
}

namespace App\Models{
/**
 * App\Models\Image
 *
 * @property int $id
 * @property int $imageable_id
 * @property string $imageable_type
 * @property string $filename
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereImageableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereImageableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperImage {}
}

namespace App\Models{
/**
 * App\Models\Lead
 *
 * @property int $id
 * @property int $company_id
 * @property int $link_id
 * @property int $status_id
 * @property string $chat_id
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $phone
 * @property string $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company $company
 * @property-read \App\Models\Link $link
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Message> $messages
 * @property-read int|null $messages_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \App\Models\Status $status
 * @method static \Illuminate\Database\Eloquent\Builder|Lead newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lead newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lead query()
 * @method static \Illuminate\Database\Eloquent\Builder|Lead whereChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lead whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lead whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lead whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lead whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lead whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lead whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lead whereLinkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lead wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lead whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lead whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lead whereUsername($value)
 * @mixin \Eloquent
 */
	class IdeHelperLead {}
}

namespace App\Models{
/**
 * App\Models\Link
 *
 * @property int $id
 * @property int $source_id
 * @property string $url
 * @property string $code
 * @property string $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Lead> $leads
 * @property-read int|null $leads_count
 * @property-read \App\Models\Source $source
 * @method static \Illuminate\Database\Eloquent\Builder|Link newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Link newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Link query()
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereSourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereUrl($value)
 * @mixin \Eloquent
 */
	class IdeHelperLink {}
}

namespace App\Models{
/**
 * App\Models\Marketing
 *
 * @property int $id
 * @property int $company_id
 * @property string $title
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company $company
 * @method static \Illuminate\Database\Eloquent\Builder|Marketing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Marketing newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Marketing query()
 * @method static \Illuminate\Database\Eloquent\Builder|Marketing whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marketing whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marketing whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marketing whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marketing whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marketing whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperMarketing {}
}

namespace App\Models{
/**
 * App\Models\Message
 *
 * @property int $id
 * @property int $lead_id
 * @property string $text
 * @property string $message_id
 * @property int $is_answer
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Lead $lead
 * @method static \Illuminate\Database\Eloquent\Builder|Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message query()
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereIsAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereLeadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperMessage {}
}

namespace App\Models{
/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $course_id
 * @property int $lead_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Course $course
 * @property-read \App\Models\Lead $lead
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereLeadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperOrder {}
}

namespace App\Models{
/**
 * App\Models\Source
 *
 * @property int $id
 * @property int $company_id
 * @property int $type_id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company $company
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Link> $links
 * @property-read int|null $links_count
 * @method static \Illuminate\Database\Eloquent\Builder|Source newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Source newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Source query()
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Source whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperSource {}
}

namespace App\Models{
/**
 * App\Models\Status
 *
 * @property int $id
 * @property int $company_id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Company $company
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Lead> $leads
 * @property-read int|null $leads_count
 * @method static \Illuminate\Database\Eloquent\Builder|Status newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Status newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Status query()
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperStatus {}
}

namespace App\Models{
/**
 * App\Models\Type
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Source> $sources
 * @property-read int|null $sources_count
 * @method static \Illuminate\Database\Eloquent\Builder|Type newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type query()
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperType {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Company> $companies
 * @property-read int|null $companies_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperUser {}
}

