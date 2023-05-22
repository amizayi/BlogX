<?php

namespace Modules\User\Filament\Resources;

use Filament\Forms\Components\Card;
use Modules\Filament\Contracts\ExportableSchema;
use Modules\Filament\Traits\WithResourceHelper;
use Modules\User\Entities\User;
use Modules\User\Filament\Resources\UserResource\Pages;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Throwable;

class UserResource extends Resource implements ExportableSchema
{
    use WithResourceHelper;

    /**
     * Resource Model Class
     *
     * @var ?string $model
     */
    protected static ?string $model = User::class;

    /**
     * Form Schema
     *
     * @param Form $form
     *
     * @return Form
     */
    public static function form(Form $form): Form
    {
        return $form->schema([Card::make(self::formSchema())->columns()]);
    }

    /**
     * Table Schema
     *
     * @param Table $table
     *
     * @return Table
     *
     * @throws Throwable
     */
    public static function table(Table $table): Table
    {
        return $table
           ->columns(self::tableSchema())
           ->filters(self::tableFilters())
           ->actions(self::tableActions())
           ->bulkActions(self::tableBulkActions());
    }

    /**
     * Get the form schema
     *
     * @return array
     */
    public static function formSchema(): array
    {
        return [];
    }

    /**
     * Get the table schema
     *
     * @return array
     */
    public static function tableSchema(): array
    {
        return [];
    }

    /**
     * Get the table filters
     *
     * @return array
     *
     * @throws Throwable
     */
    public static function tableFilters(): array
    {
        return [];
    }

    /**
     * Get the table actions
     *
     * @return array
     *
     * @throws Throwable
     */
    public static function tableActions(): array
    {
        return [
            Tables\Actions\EditAction::make(),
        ];
    }

    /**
     * Get the table bulk actions
     *
     * @return array
     *
     * @throws Throwable
     */
    public static function tableBulkActions(): array
    {
        return [
            Tables\Actions\DeleteBulkAction::make(),
        ];
    }

    /**
     * Resource Relations
     *
     * @return array
     */
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    /**
     * Resource Pages
     *
     * @return array
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
