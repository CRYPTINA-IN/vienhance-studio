<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Contact extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'fname',
        'lname',
        'email',
        'phone',
        'message',
        'ip_address',
        'location_data',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'location_data' => 'array',
    ];

    /**
     * Get the full name of the contact
     */
    public function getFullNameAttribute()
    {
        return $this->fname.' '.$this->lname;
    }

    /**
     * Scope to get unread messages
     */
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    /**
     * Scope to get read messages
     */
    public function scopeRead($query)
    {
        return $query->where('is_read', true);
    }

    /**
     * Mark message as read
     */
    public function markAsRead()
    {
        $this->update(['is_read' => true]);
    }

    /**
     * Get location data from IP address
     */
    public function getLocationFromIp()
    {
        if (! $this->ip_address || $this->location_data) {
            return $this->location_data;
        }

        try {
            // Skip geolocation for local/private IPs
            if (filter_var($this->ip_address, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
                return null;
            }

            $url = "http://ip-api.com/json/{$this->ip_address}?fields=status,message,country,countryCode,region,regionName,city,zip,lat,lon,timezone,isp,org,as,query";

            $response = file_get_contents($url);
            $data = json_decode($response, true);

            if ($data && isset($data['status']) && $data['status'] === 'success') {
                $locationData = [
                    'country' => $data['country'] ?? null,
                    'country_code' => $data['countryCode'] ?? null,
                    'region' => $data['region'] ?? null,
                    'region_name' => $data['regionName'] ?? null,
                    'city' => $data['city'] ?? null,
                    'zip' => $data['zip'] ?? null,
                    'latitude' => $data['lat'] ?? null,
                    'longitude' => $data['lon'] ?? null,
                    'timezone' => $data['timezone'] ?? null,
                    'isp' => $data['isp'] ?? null,
                    'organization' => $data['org'] ?? null,
                    'as_number' => $data['as'] ?? null,
                ];

                // Save the location data
                $this->update(['location_data' => $locationData]);

                return $locationData;
            }

            return null;
        } catch (\Exception $e) {
            Log::warning('IP geolocation failed for IP: '.$this->ip_address.' - '.$e->getMessage());

            return null;
        }
    }

    /**
     * Get formatted location string
     */
    public function getFormattedLocationAttribute()
    {
        $location = $this->location_data ?: $this->getLocationFromIp();

        if (! $location) {
            return 'Location unavailable';
        }

        $parts = [];
        if (! empty($location['city'])) {
            $parts[] = $location['city'];
        }
        if (! empty($location['region_name'])) {
            $parts[] = $location['region_name'];
        }
        if (! empty($location['country'])) {
            $parts[] = $location['country'];
        }

        return ! empty($parts) ? implode(', ', $parts) : 'Location unavailable';
    }

    /**
     * Scope to get recent contacts
     */
    public function scopeRecent($query, $days = 30)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }

    /**
     * Get the contact's initials
     */
    public function getInitialsAttribute()
    {
        return strtoupper(substr($this->fname, 0, 1).substr($this->lname, 0, 1));
    }
}
