import { Component, OnInit } from '@angular/core';
import {NotesService} from "../../../services/notes.service";
import {CommonService} from "../../../services/common.service";

@Component({
  selector: 'app-notes-list',
  templateUrl: './notes-list.component.html',
  styleUrls: ['./notes-list.component.scss']
})
export class NotesListComponent implements OnInit {

  public notes : any [] = [];

  constructor(private notesService: NotesService, private commonService: CommonService) { }

  ngOnInit(): void {
    this.getNotes();

    this.commonService.noteAdded_Observable.subscribe(res => {
      this.getNotes();
    });
  }

  private getNotes() {
    this.notesService.getNotes().subscribe(res => {
      this.notes = res['data'];
    });
  }

  private createNote() {
    const reqObj = {
      'title' : 'title 1',
      'description' : '1234'
    }
    this.notesService.createNote(reqObj).subscribe(res => {
      console.log('data response', res);
    });
  }
}
