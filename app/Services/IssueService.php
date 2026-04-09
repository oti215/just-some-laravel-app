<?php

namespace App\Services;

use App\Enums\IssueStatusEnum;
use App\Models\Issue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class IssueService
{
    public function createIssue(string $title, string $description)
    {
        if (empty($title) || empty($description)) {
            return false;
        }

        try {
            $issue = new Issue();
            $issue->user_id = Auth::id();
            $issue->assignee_id = null; // No assignee at creation
            $issue->title = Str::title($title);
            $issue->description = Str::ucfirst(Str::trim($description));
            $issue->status = IssueStatusEnum::OPEN->value;
            $issue->save();

            return $issue;
        } catch (\Exception $e) {
            // Handle exceptions, log errors, etc.
            throw $e; // Re-throw or handle as needed
        }

        return false;
    }
}
