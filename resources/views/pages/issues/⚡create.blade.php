<?php

use App\Services\IssueService;
use Livewire\Attributes\Validate;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

new class extends Component
{
    use Interactions;

    #[Validate('required|string|max:255')]
    public $title = '';

    #[Validate('required|string')]
    public $description = '';

    public function save(IssueService $issueService)
    {
        $this->validate();

        $createdIssue = $issueService->createIssue($this->title, $this->description);

        if ($createdIssue->exists()) {
            $this->toast()
                ->success('Issue created!')
                ->flash()
                ->send();

            return $this->redirect(route('home'), navigate: true);
        }

        $this->toast()
            ->error('Failed to create issue. Please try again.')
            ->send();
    }
};
?>

<div class="w-full xl:w-1/2 mx-auto">
    <x-card>
        <h2 class="mb-4 text-2xl font-bold">Create New Issue</h2>

        <form wire:submit="save" class="space-y-4">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <x-input id="title" name="title" type="text" required autofocus wire:model="title" />
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <x-textarea id="description" name="description" required wire:model="description"></x-textarea>
            </div>

            <div class="flex justify-end gap-2">
                <x-secondary-button text="Cancel" href="{{ route('home') }}" wire:navigate />
                <x-primary-button type="submit" text="Save" />
            </div>
        </form>
    </x-card>
</div>
