import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { NotesRoutingModule } from './notes-routing.module';
import { NotesComponent } from './notes.component';
import { NotesListComponent } from './notes-list/notes-list.component';
import {ModalModule} from "../_modal";
import {FormsModule} from "@angular/forms";


@NgModule({
  declarations: [
    NotesComponent,
    NotesListComponent,
  ],
  imports: [
    CommonModule,
    NotesRoutingModule,
    ModalModule,
    FormsModule
  ]
})
export class NotesModule { }
