<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\WireLinkColumn;


use App\Models\Member;


class MemberTable extends DataTableComponent
{
    protected $model = Member::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Member id", "member_id")
                ->sortable(),
            Column::make("Last name", "last_name")
                ->sortable()
                ->searchable(),
                // ->view('member-view{member_id}'),
                
            Column::make("First name", "first_name")
                ->sortable(),
            Column::make("Middle name", "middle_name")
                ->sortable(),
            Column::make("T birth", "t_birth")
                ->sortable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make("Phone", "phone")
                ->sortable(),
            Column::make("Aka", "aka")
                ->sortable(),
            Column::make("Gt", "gt")
                ->sortable(),
            Column::make("Batch name", "batch_name")
                ->sortable(),
            Column::make("Current chapter", "current_chapter")
                ->sortable(),
            Column::make("Root chapter", "root_chapter")
                ->sortable(),
            Column::make("Status", "status")
                ->sortable(),
            Column::make("User id", "user_id")
                ->sortable(),
            Column::make("User type", "user_type")
                ->sortable(),
            Column::make("Region", "region")
                ->sortable(),
            Column::make("Province", "province")
                ->sortable(),
            Column::make("Municipality", "municipality")
                ->sortable(),
            Column::make("Barangay", "barangay")
                ->sortable(),
            Column::make("Address", "address")
                ->sortable(),
            Column::make("Photo", "photo")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
             
           
        ];
        
    }
    
}
