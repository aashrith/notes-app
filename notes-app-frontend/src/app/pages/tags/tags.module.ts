import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { TagsRoutingModule } from './tags-routing.module';
import { TagsComponent } from './tags.component';
import { TagsListComponent } from './tags-list/tags-list.component';


@NgModule({
  declarations: [
    TagsComponent,
    TagsListComponent
  ],
  imports: [
    CommonModule,
    TagsRoutingModule
  ]
})
export class TagsModule { }
