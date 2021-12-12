import { Injectable } from '@angular/core';
import { Subject } from "rxjs";

@Injectable({
  providedIn: 'root'
})
export class CommonService {

  public noteAdded_Observable = new Subject();
  public tagAdded_Observable = new Subject();
  public tagDeleted_Observable = new Subject();

  constructor(){

  }

  notifyNoteAddition(){
    this.noteAdded_Observable.next(void 0);
  }

  notifyTagAddition(){
    this.tagAdded_Observable.next(void 0);
  }

  notifyTagDeletion(){
    this.tagDeleted_Observable.next(void 0);
  }

}
