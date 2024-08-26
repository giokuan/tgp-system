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
use Illuminate\Support\Facades\Session;

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

    public function datasource(): Builder
    {
        return Member::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('member_id')
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
            ->add('region')
            ->add('province')
            ->add('municipality')
            ->add('barangay')
            ->add('address')
            ->add('photo')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
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

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Phone', 'phone')
                ->sortable()
                ->searchable(),

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
        $this->redirect(route('member-view', ['id' => $rowId]));
    }



    

    public function actions(Member $row): array
    {
        return [
            Button::add('edit')
                ->slot('View')
                ->id()
                ->class('bg-green-500 p-2 rounded-lg dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id])
       
             
        ];
    }

    


}

