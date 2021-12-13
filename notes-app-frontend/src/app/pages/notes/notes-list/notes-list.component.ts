import { Component, OnInit } from '@angular/core';
import {NotesService} from "../../../services/notes.service";
import {CommonService} from "../../../services/common.service";
import {ModalService} from "../../_modal";
import {TagsService} from "../../../services/tags.service";

@Component({
  selector: 'app-notes-list',
  templateUrl: './notes-list.component.html',
  styleUrls: ['./notes-list.component.scss']
})
export class NotesListComponent implements OnInit {

  public notes : any [] = [];
  public tags  : any [] = [];
  public showErrorWarning : Boolean = false;
  public title : string = '';
  public description : string = '';
  public checkedTagsIdArray: Array<string> = [];

  constructor(
    private notesService: NotesService,
    private commonService: CommonService,
    private modalService: ModalService,
    private tagService: TagsService ) { }

  ngOnInit(): void {
    this.getNotes();
    this.getTags();

    this.commonService.noteAdded_Observable.subscribe(res => {
      this.getNotes();
    });
  }

  private getNotes() {
    this.notesService.getNotes().subscribe(res => {
      this.notes = res['data'];
    });
  }

  createNote() {
    const reqObj = {
      'title' : this.title,
      'description' : this.description,
      'tags': this.checkedTagsIdArray
    }
    console.log(reqObj);
    this.notesService.createNote(reqObj).subscribe(res => {
      this.closeModal('notes-add-model');
      this.commonService.notifyNoteAddition();

      //reset
      this.title = '';
      this.description = '';
      this.checkedTagsIdArray = [];

      console.log('data response', res);
    }, error => {
      this.showErrorWarning = true;
    });
  }

  openModal(id: string) {
    this.modalService.open(id);
  }

  closeModal(id: string) {
    this.modalService.close(id);
  }

  private getTags() {
    this.tagService.getTags().subscribe(res => {
      this.tags = res['data'];
    });
  }

  onCheckBoxChange(tag: any) {
    const tagId: string = tag['id'];
    if(!this.checkedTagsIdArray.includes(tagId)){
      this.checkedTagsIdArray.push(tagId);
    }else{
      this.checkedTagsIdArray.splice(this.checkedTagsIdArray.indexOf(tagId), 1);
    }
  }

}
