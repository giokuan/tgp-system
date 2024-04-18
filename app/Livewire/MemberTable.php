<?php

namespace App\Livewire;

use App\Models\Member;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use App\Models\User;
use Illuminate\Support\Facades\Log;




final class MemberTable extends PowerGridComponent
{
    use WithExport;
  
  


    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    //     public function getProfilePhotoUrl($user_Id)
    // {
    //     $user = User::find($user_Id);
    
    //     if ($user && $user->profile_photo_path) {
    //         return asset('storage/profile-photos/' . $user->profile_photo_path);
    //     } else {
    //         return null;
    //     }
    // }


    public function datasource(): Builder
    {
        // return Member::query();
        return Member::query()->with('user');
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')


            // ->add('user.profile_photo_path', function (Member $model) {
            //     $photoUrl = $model->user->profile_photo_path;
            //     if ($photoUrl) {
            //         return '<img src="' . asset($photoUrl) . '" alt="Photo" width="50" height="50">';
            //     } else {
            //         return 'No photo available';
            //     }
            // })
            
            ->add('last_name')
            ->add('first_name')
            ->add('middle_name')
            ->add('t_birth_formatted', fn (Member $model) => Carbon::parse($model->t_birth)->format('d/m/Y'))
            ->add('email')
            ->add('phone')
            ->add('aka')
            ->add('gt')
            ->add('batch_name')
            ->add('current_chapter')
            ->add('root_chapter')
            ->add('status')
            ->add('user_id')
            ->add('user_type')
            ->add('member_id');
            // ->add('region')
            // ->add('province')
            // ->add('municipality')
            // ->add('barangay')
            // ->add('address')
            // ->add('created_at');
            
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),

            // Column::make('Profile Photo', 'user.profile_photo_path')
            // ->sortable()
            // ->searchable(),
            
            Column::make('Member id', 'member_id')
            ->sortable()
            ->searchable(),

            Column::make('Last name', 'last_name')
                ->sortable()
                ->searchable(),


            Column::make('First name', 'first_name')
                ->sortable()
                ->searchable(),

            Column::make('Middle name', 'middle_name')
                ->sortable()
                ->searchable(),

            Column::make('T birth', 't_birth_formatted', 't_birth')
                ->sortable(),

            // Column::make('Email', 'email')
            //     ->sortable()
            //     ->searchable(),

            // Column::make('Phone', 'phone')
            //     ->sortable()
            //     ->searchable(),

            Column::make('Aka', 'aka')
                ->sortable()
                ->searchable(),

            Column::make('Gt', 'gt')
                ->sortable()
                ->searchable(),

            Column::make('Batch name', 'batch_name')
                ->sortable()
                ->searchable(),

            Column::make('Current chapter', 'current_chapter')
                ->sortable()
                ->searchable(),

            Column::make('Root chapter', 'root_chapter')
                ->sortable()
                ->searchable(),

            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),


            // Column::make('User id', 'user_id'),
            // Column::make('User type', 'user_type')
            //     ->sortable()
            //     ->searchable(),

      

            // Column::make('Region', 'region')
            //     ->sortable()
            //     ->searchable(),

            // Column::make('Province', 'province')
            //     ->sortable()
            //     ->searchable(),

            // Column::make('Municipality', 'municipality')
            //     ->sortable()
            //     ->searchable(),

            // Column::make('Barangay', 'barangay')
            //     ->sortable()
            //     ->searchable(),

            // Column::make('Address', 'address')
            //     ->sortable()
            //     ->searchable(),

            // Column::make('Created at', 'created_at_formatted', 'created_at')
            //     ->sortable(),

            // Column::make('Created at', 'created_at')
            //     ->sortable()
            //     ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('t_birth'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        // $this->js('alert('.$rowId.')');
        $this->js('window.location.href = "/edit-profile/' . $rowId . '";');
    }

    #[\Livewire\Attributes\On('view')]
    public function view($rowId): void
    {
        // $this->js('alert('.$rowId.')');
        $this->js('window.location.href = "/profile-view/' . $rowId . '";');
    }

    public function actions(Member $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->id()
                ->class('py-1 px-4 bg-blue-500 text-sm rounded pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->member_id]),
            
               

                

                Button::add('view')
                // ->slot('Edit: '.$row->id)
                ->slot('View')
                ->id()
                ->class('py-1 px-4 bg-success text-sm rounded pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('view', ['rowId' => $row->member_id])
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
