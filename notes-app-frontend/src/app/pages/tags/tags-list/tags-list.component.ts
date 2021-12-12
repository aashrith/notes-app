import { Component, OnInit } from '@angular/core';
import {TagsService} from "../../../services/tags.service";
import {CommonService} from "../../../services/common.service";

@Component({
  selector: 'app-tags-list',
  templateUrl: './tags-list.component.html',
  styleUrls: ['./tags-list.component.scss']
})
export class TagsListComponent implements OnInit {
  public tags : any [] = [];
  public tagName: string = '';

  constructor(private tagsService: TagsService, private commonService: CommonService) { }

  ngOnInit(): void {
    this.getTags();

    this.commonService.tagAdded_Observable.subscribe(res => {
      this.getTags();
    });

    this.commonService.tagDeleted_Observable.subscribe(res => {
      this.getTags();
    });
  }

  private getTags() {
    this.tagsService.getTags().subscribe(res => {
      this.tags = res['data'];
    });
  }

  public createTag() {
    const reqObj = {
      'name' : this.tagName,
    }
    this.tagsService.createTag(reqObj).subscribe(res => {
      this.commonService.notifyTagAddition();
      this.tagName = '';
    });
  }

  public deleteTag(id: number) {
    this.tagsService.deleteTag(id).subscribe(res => {
      this.commonService.notifyTagDeletion();
    });
  }
}
