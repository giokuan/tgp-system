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
            // Column::make('ID', 'id')
            // ->sortable()
            //     ->searchable(),
            Column::make('MEMBER ID', 'member_id')
                ->sortable()
                ->searchable(),

            Column::make('LAST NAME', 'last_name')
                ->sortable()
                ->searchable(),

            Column::make('FIRST NAME', 'first_name')
                ->sortable()
                ->searchable(),

            Column::make('MIDDLE NAME', 'middle_name')
                ->sortable()
                ->searchable(),

            Column::make('T BIRTH', 't_birth_formatted', 't_birth')
                ->sortable(),

            // Column::make('EMAIL', 'email')
            //     ->sortable()
            //     ->searchable(),

            Column::make('PHONE', 'phone')
                ->sortable()
                ->searchable(),

            Column::make('AKA', 'aka')
                ->sortable()
                ->searchable(),

            Column::make('GT', 'gt')
                ->sortable()
                ->searchable(),

            Column::make('BATCH NAME', 'batch_name')
                ->sortable()
                ->searchable(),

            Column::make('CURRENT CHAPTER', 'current_chapter')
                ->sortable()
                ->searchable(),

            Column::make('ROOT CHAPTER', 'root_chapter')
                ->sortable()
                ->searchable(),

            Column::make('STATUS', 'status')
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
                ->slot('VIEW')
                ->id()
                ->class(' px-8 rounded-lg border p-2 text-black dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id])
       
             
        ];
    }

    


}

