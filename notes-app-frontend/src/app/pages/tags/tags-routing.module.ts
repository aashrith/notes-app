import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import {TagsListComponent} from "./tags-list/tags-list.component";

const routes: Routes = [
  {
    path: 'tags',
    children: [
      {
        path: '',
        component: TagsListComponent
      }
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class TagsRoutingModule { }
